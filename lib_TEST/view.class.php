<?php
class View{

    protected $data;
    protected $path;

    protected static function getDefaultViewPath(){
        $router = App::getRouter();
        if (!$router) {
            return false;
        }
        $controller_dir = $router->getController();
        $template_name = $router->getMethod_prefix().$router->getAction().'.php';
        return VIEWS_PATH.DS.$controller_dir.DS.$template_name;    
    }

    //Default Constructor
    public function __construct($data = array(), $path=null){
        if(!$path){
            $path = self::getDefaultViewPath();
        }
        
        try{
            if(!file_exists($path)){
                throw new Exception('Template file is not in path: '.$path);
            }   
            $this->path = $path;
            $this->data = $data;
            
        } catch(Exception $e){
            echo 'Error: ' .$e->getMessage().'<br>';
        }
    }

    //Function render
    public function render(){
        $data = $this->data;

        ob_start();
        include($this->path);    
        $content = ob_get_clean();

        return $content;
    }

    /**
     * Get the value of path
     */ 
    public function getPath()
    {
        return $this->path;
    }

    
}