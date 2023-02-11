<?php

namespace App\Controllers;

use Attribute;
use DOMDocument;


class Test extends BaseController
{

    const TMPFOLDER = 'decompress/';
    private $mainpath = null;

    public function index()
    {
        $this->Hunabku->title = "Analizador";
        $params =  [
            'action' => base_url('test/uploadFile')
        ];
        return $this->Hunabku->Render('form',$params);
    }


    public function uploadFile()
    {
        
        $validation = [
            'declaration' => [
                'uploaded[declaration]',
                'ext_in[declaration,zip]',
                'max_size[declaration,5000]'
            ],
        ];
        if( !$this->validate($validation) )
            return json_encode($this->validator->getErrors());
        $_file = $this->request->getFile('declaration');
        if (! $_file->hasMoved()):
            $name = $_file->store(self::TMPFOLDER);       
            return self::extract((string) $name);
        endif;
    }

    public function extract($compressed)
    {
        $this->Hunabku->title = "Auditoria";
        $_cachepath = WRITEPATH.'uploads/';
        $zip = new \ZipArchive;
        if ($zip->open($_cachepath.$compressed) === TRUE):
            $main = explode('/',$zip->getNameIndex(0))[0];
            $zip->extractTo($_cachepath.self::TMPFOLDER);
            $zip->close();
            $this->mainpath = $_cachepath.self::TMPFOLDER.$main; 
        else:
                echo 'failed';
        endif;
        $directory = self::mapDirectory($this->mainpath);
        var_dump($directory);
        /*$params =[
                'data' => self::setCalcultationRules($directory) ,
                'sumt' => 0.0,
                'sumi' => 0.0,
                'sums' => 0.0,
            ];
        return $this->Hunabku->Render('table',$params);*/
    }

    public function setCalcultationRules($directory)
    {
        
        $balance = [];
        $_data = [];
        try {
            foreach($directory as $months => $files):
                $_data = [];
                foreach($files as $file => $name):
                    $pathfile = $this->mainpath.'/'.$months.$name;
                    list($key,$version,$subtotal,$iva,$total , $method , $pay , $fecha) = self::getDataFinancial($pathfile);
                    $_data[] = (object) [
                                'certificado'   => $key,
                                'version'       => $version,
                                'subtotal'      => $subtotal,
                                'impuesto'      => $iva,
                                'total'         => $total,
                                'metodo'        => $method,
                                'forma'         => $pay,   
                                'fecha'         => $fecha,
                                'success'       => ($total >= 20000 && $pay == 1) ? FALSE : TRUE ,
                                'file'          =>  $pathfile
                            ];
                    $balance[$months] = $_data;
                endforeach;
            endforeach;
        return $balance;
        } catch (\Throwable $th) {
          exit('la estructura del archivo es incorrecta. La estructura es Año/Meses/Archivos '. $th->getMessage() .' ->'. $th->getLine());
        }   
    }

    public function getDataFinancial($_resource)
    {
        $data = null;
        try {
            $objxml = \simplexml_load_file($_resource);
            $objxml->registerXPathNamespace("tfd", "http://www.sat.gob.mx/TimbreFiscalDigital");
            $iva = empty($objxml->xpath('cfdi:Impuestos')[0]['TotalImpuestosTrasladados']) ? '0.0' : $objxml->xpath('cfdi:Impuestos')[0]['TotalImpuestosTrasladados'] ;
            $uuid = $objxml->xpath('//tfd:TimbreFiscalDigital')[0]['UUID'];
            $data =  [ 
                        (string) $uuid,
                        (string) $objxml["Version"] , 
                        (double) $objxml["SubTotal"] ,
                        (double) $iva,
                        (double) $objxml['Total'] , 
                        (string) $objxml['MetodoPago'],
                        (int)    $objxml['FormaPago'] , 
                        (string) $objxml['Fecha'] ,
                    ];
        } catch (\Throwable $th) {
            $data = FALSE;
        }finally{
            return $data ;
        }
    }

    public function mapDirectory(string $path){
        helper('filesystem');
        var_dump(directory_map($path));
        //unset($map['__MACOSX/']);
        //unset($map['.git/']);
        //return $map;
    }

    private function _sortDirectory(array $directory)
    {
        $items = array();
        foreach ($directory as $key => $val):
            if (is_array($val)):
                $items[$key] = (!empty($array)) ? self::_sortDirectory($val) : $val; 
            else:
                $items[$val] = $val;
            endif;
        endforeach;
        ksort($items); 
        return $items;
    }

}
