<?php

class App{

    protected static $router;
    protected static $db;
    protected static $auth;
    /**
     * Get the value of router
     */ 
    public static function getRouter()
    {
        return self::$router;
    }
    public static function getConnection(){
        return self::$db->getConn();
    }
    public static function run($uri){
        $auth = true;
        self::$router = new Router($uri,$auth);
        self::$db = new Db;
    
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
        $layout_view_object = new View(compact('content','auth'), $layout_view_path);

        echo isset($_SESSION['user_id'])?'true':'false';
        isset($_SESSION['full_name']);
        
        // //TESTING OUTPUT. DELETE AFTER ISUUE RESOLVES
        echo '<br>';
        echo 'BASE_URL = '.BASE_URL;
        echo '<br>';
        echo 'ROOT_URL = '.ROOT_URL;
        echo '<br>';
        echo 'ROOT_URL MANUAL = '.substr($_SERVER['PHP_SELF'], 0, - (strlen('/public/index.php')));
        echo '<br>';
        echo $_SERVER['PHP_SELF'];
        echo "<br>";
        echo $_SERVER['SERVER_NAME'];
        echo "<br>";
        echo $_SERVER['HTTP_HOST'];
        echo "<br>";
        echo $_SERVER['HTTP_USER_AGENT'];
        echo "<br>";
        echo $_SERVER['SCRIPT_NAME'];
        echo "<br>";
        echo '<br>';
        
        echo ROOT;
        //END OF OUTPUT TEST
        echo $layout_view_object->render();
        


        



    }


}
?>