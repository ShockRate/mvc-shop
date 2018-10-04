<?php
$data['excel'] = new retrieveExcel(DATA);
$data['types'] = new retrieveExcel(TYPES);
if (isset($_SESSION['order']) && !empty($_SESSION['order'])){
    include_once 'viewOrderDetails.php';
    include_once 'viewCreateFrame.php';
    //include_once 'viewDetails.php';
    include_once 'viewOrderTable.php';
    //include_once 'viewFrameSill.php';
} else {
    include_once 'viewCreateOrder.php';

}

?> 
