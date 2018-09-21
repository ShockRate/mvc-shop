<?php
require "createOrder.php";

$createorder = new CreateOrder;

if (filter_input(INPUT_POST,'newOrder')) {
    $orderData = array_map('trim', filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING));
    $errors  = $createorder->newOrder($orderData);
    //$general_msg = $errors['msg'];   
}

if (isset($_SESSION['order']) && !empty($_SESSION['order'])){
    include_once './views/viewCreateFrame.php';
    include_once './views/viewDetails.php';
    include_once './views/viewOrderDetails.php';
    include_once './views/viewOrderTable.php';
    include_once './views/viewFrameSill.php';            
}else{
    include './views/viewCreateOrder.php';
}

?>