
<!DOCTYPE html>
<html>
<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

   <!--  Για να δουλευει σον chrome? -->
    <meta http-equiv="pragma" content="no-cache" />
 
    <title><?= Config::get('site_name'); /*echo $page_title;*/?></title>
 
    <!-- Latest compiled and minified Bootstrap CSS -->
   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="<?php echo BASE_URL; ?>public/css/builder.css" rel="stylesheet" media="screen"> 
    <link href="<?php echo BASE_URL; ?>public/css/index.css" rel="stylesheet" media="screen"> 
    <link href="<?php echo BASE_URL; ?>public/css/modal.css" rel="stylesheet" media="screen"> 
    <link href="<?php echo BASE_URL; ?>public/css/style.css" rel="stylesheet" media="screen"> 
    
   
   
 

   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.js"></script>
    
 


</head>
<body>
    <header>
        <h1><?php //echo $page_header_title?></h1>
    </header>
 <?php include_once 'navigation.php'; ?>

<div class="contents">

<?php 
    if (isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
    setcookie(session_name(),'',time()-3600);
}
    echo isset($general_msg)?$general_msg:'';
    ?>
