<?php
class Router{

    protected $uri;
    protected $controller;
    protected $action;
    protected $params;
    protected $route;
    protected $method_prefix;

    /**
     * Get the value of url
     */ 
    public function getUri(){
        return $this->uri;
    }

    /**
     * Get the value of controller
     */ 
    public function getController(){
        return $this->controller;
    }

    /**
     * Get the value of action
     */ 
    public function getAction(){
        return $this->action;
    }

    /**
     * Get the value of params
     */ 
    public function getParams(){
        return $this->params;
    }

    /**
     * Get the value of route
     */ 
    public function getRoute(){
        return $this->route;
    }

    /**
     * Get the value of method_prefix
     */ 
    public function getMethod_prefix(){
        return $this->method_prefix;
    }

    //Default constructor
    public function __construct($uri, $authentication = FALSE){

        //print_r('Ok! Router was called with uri: '.$uri);
        $this->uri = urldecode(trim($uri, '/'));

        //Get Defaults
        $routes =  Config::get('routes');
        $this->route = Config::get('default_route');
        $this->method_prefix = isset($routes[$this->route]) ? $routes[$this->route] : '';
        $this->controller = Config::get('default_controller');
        $this->action = Config::get('default_action');

        //Set route if NOT authenticated
        if(!Auth::loggedIn()){
            $this->controller = 'login';
            $this->action = 'index';
            
        }
            
        //Get path like /controller/action/param1/param2..../...
        $uri_parts = explode('?', $this->uri);
        $path = $uri_parts[0];
        $path_parts = explode('/', $path);

        //if(count($path_parts)){
        if(count($path_parts) && Auth::loggedIn()){
            //Remove folder name. Used during local testing
            //if (current($path_parts) == 'pub'){
            if (current($path_parts) == 'mvc-shop'){
               array_shift($path_parts);
            }
            //Get route element
            if(in_array(strtolower(current($path_parts)),array_keys($routes))){
                $this->route = strtolower(current($path_parts));
                $this->method_prefix = isset($routes[$this->route]) ? $routes[$this->route] : '';
                array_shift($path_parts);
            }
            
            //Get controller -  next ellement of array
            if (current($path_parts)) {
                $this->controller = strtolower(current($path_parts));
                array_shift($path_parts);
                
            }

            //Get action 
            if (current($path_parts)) {
                $this->action = strtolower(current($path_parts));
                array_shift($path_parts);
                
            }

            //Get params
            $this->params = $path_parts;        

        }
        



    }
} 