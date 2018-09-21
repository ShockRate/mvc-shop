<?php

class App{

    protected static $router;

    /**
     * Get the value of router
     */ 
    public static function getRouter()
    {
        return self::$router;
    }
    public static function run($uri){
        self::$router = new Router($uri);

        $controller_class = ucfirst(self::$router->getController()).'Ctrl'; 
        $controller_method = strtolower(self::$router->getMethod_prefix().self::$router->getAction());

        //Calling controller's method
        try{
            if(class_exists($controller_class)){
                $controller_object =  new $controller_class();
            } else {
                throw new Exception('Class "'.$controller_class.' does not exist');
            }
            if (method_exists($controller_object, $controller_method)) {
                //Controller's action may return a view path
                //$result =  $controller_object->$controller_method();
                $view_path = $controller_object->$controller_method();
                $view_object = new View($controller_object->getData(), $view_path);
                $content = $view_object->render();

            } else {
                throw new Exception('Method "'.$controller_method.'" of class '.$controller_class.' does not exist');
            }
        } catch(Exception $e){
            echo 'Error: ' .$e->getMessage().'<br>';
        }

        $layout = self::$router->getRoute();
        $layout_view_path = VIEWS_PATH.DS.$layout.'.php';
        $layout_view_object = new View(compact('content'), $layout_view_path);

        echo '$view_path: '.$view_path;
        echo '<br>';
        echo '$layout_view_path: '.$layout_view_path;
        echo '<br>';
        echo  '$layout_view_object->getPath(): '.$layout_view_object->getPath();
        echo '<br>';
       

       
        echo $layout_view_object->render();


        



    }


}
?>