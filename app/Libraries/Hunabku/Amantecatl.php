<?php 

namespace App\Libraries\Hunabku;

class Amantecatl extends \App\Libraries\Hunabku\Kalmanani
{


    public function TopNavBar(array $params){
        $component = $this->config->widgets.strtolower(__FUNCTION__);
        $properties = [
                'color' => $params[0],
                'logo'  => base_url('_assets/images/atik-logo.png') ,
                'app' => $this->app->name ,
                'shortcuts' => self::_widgets(['_carduser','_fullscreen'])
            ];
        return  view($component,$properties);
    }

    private function _widgets(array $molecules){  
        $widgets = null;
        try{ 
            $widgets.= view($this->config->widgets.$molecules[1]);
            $widgets .= view(
                $this->config->widgets.$molecules[0],
                array(
                    'avatar' => base_url(ASSETS_IMAGES.'/avatar-default.png') ,
                    'profile' => '(object) $auth->user()->row()',
                    'exit' => base_url('logout')
                ),
            );
        }catch(\Throwable $error) {
            throw new \Exception(
                'Widget '.__FUNCTION__.' : '.$error->getMessage()
            );        
        }finally{
            return $widgets;
        }
    }


    public function TopNavMenu(array $params){
        $component = $this->config->widgets.strtolower(__FUNCTION__);
        $objxml = \simplexml_load_file($this->config->sitemaps);
            $_menu = [];
            foreach($objxml as $nodes):
                $_menu[(string) $nodes["name"] ] = [
                        "icon" => (string) $nodes->icon , 
                        "url" =>  (string) $nodes->url ,
                        "dropdown" => count($nodes->subitems) > 0 ? TRUE : FALSE ,
                        "submenu" => $nodes->subitems
                    ];
            endforeach;
        $properties = ['menu'=> (object) $_menu];
        return  view($component,$properties);
    }


}
