<?php


define('ROOT_URL', substr($_SERVER['PHP_SELF'], 0, - (strlen('/public/index.php'))));
define('BASE_URL', 'http://'.$_SERVER['SERVER_NAME'].ROOT_URL.'/');

define('MYSQL', './inc/mysql_connection_link.php');
define('HEADER', '../views/inc/header.php');  
define('FOOTER', '../views/inc/footer.php');
define('ADMIN_EMAIL','s_tottas@epal.gr');

define('TYPES', ROOT.DS.'data'.DS.'types.xlsx');
define('DATA', ROOT.DS.'data'.DS.'data.xlsx');
define('PRINT_SHEET', ROOT.DS.'data'.DS.'3_Prototype.xlsx');


define('VIEWS_PATH', ROOT.DS.'views');

$config = parse_ini_file('../data/db.ini');
define('DB_USER', $config['username']); 
define('DB_PASSWORD', $config['password']);
define('DB_HOST', 'localhost');
define('DB_NAME', $config['db']);

Config::set('site_name', 'Your Site Name');
Config::set('routes', array(
    'default' => '',
    'admin' => 'admin_',
));
Config::set('default_route', 'default');
Config::set('default_controller', 'pages');
Config::set('default_action', 'index');


function between($val, $x, $y){

    $val_len = strlen($val);
    return ($val_len >= $x && $val_len <= $y)?TRUE:FALSE;

}

function returnNonZero($myVal){
    if($myVal == 0)
        return " ";
    else return $myVal; 

}