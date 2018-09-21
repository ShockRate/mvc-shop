<?php
class Controller{

    protected $data;
    protected $model;
    protected $params;

    

    /**
     * Get the value of data
     */ 
    public function getData()
    {
        return $this->data;
    }

    /**
     * Get the value of model
     */ 
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Get the value of params
     */ 
    public function getParams()
    {
        return $this->params;
    }

    public function __construct($data = array()){
        $this->data =  $data;
        $this->params =  App::getRouter()->getParams();
       
    }

}