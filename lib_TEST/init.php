<?php

spl_autoload_register(function($class_name){
    $lib_path = ROOT.DS.'lib_TEST'.DS.strtolower($class_name).'.class.php';
    $controllers_path = ROOT.DS.'controllers'.DS.str_replace('controller','',strtolower($class_name)).'.controller.php';
    $model_path = ROOT.DS.'model'.DS.strtolower($class_name).'.php';
    $class_path = ROOT.DS.'classes'.DS.strtolower($class_name).'.php';

    try{
        if (file_exists($lib_path)){
            require_once $lib_path;
        } elseif (file_exists($controllers_path)){
            require_once $controllers_path;
        }elseif (file_exists($model_path)){
            require_once $model_path;
        }elseif (file_exists($class_path)){
            require_once $class_path;
        }else{
            throw new Exception('Failed to include: '.$class_name);
            
        }
    } catch(Exception $e){
        echo 'Error: ' .$e->getMessage().'<br>';
    }
});

require_once ROOT.DS.'config'.DS.'config.php';