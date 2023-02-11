<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Recorder extends Entity
{

    const FILESYSTEM = 'http://localhost:8080/_filesystem/cuenta-publica/';

    protected $attributes = [
        'id'         => null,
        'path'       => null,
        'file'       => null, 
        'name'       => null,
        'extension'  => null,
        'type'       => null,
        'active'     => null,
        'metadatas'  => null,
        'resource'   => null,
        'icon'       => null,
    ];
    protected $datamap = [

    ];
    protected $dates   = ['created_on', 'updated_on'];
    protected $casts   = [];

    public function setResource(string $pathfile){
       $this->attributes['resource'] = self::FILESYSTEM.$pathfile;
       return $this;
    }

    public function setIcon(string $extension)
    {
        if(in_array($extension,['xls','xlsx']))
            $this->attributes['icon'] = base_url(ASSETS_IMAGES.'/icon-excel.svg');
        if(in_array($extension,['doc','docx']))
            $this->attributes['icon'] =  base_url(ASSETS_IMAGES.'/icon-word.svg');
        if($extension =='pdf')
            $this->attributes['icon'] =  base_url(ASSETS_IMAGES.'/icon-pdf.svg');
        return $this;
    }


}
