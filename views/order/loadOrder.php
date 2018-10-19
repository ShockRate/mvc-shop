<?php 
print_r($data['order']); 
foreach ($_SESSION['test_Cart'] as $arr) { 
    echo "<pre>";
    print_r($arr);
    //foreach ($arr as $key => $value) {
        # code...
        //echo "{$key} => {$value} ";
   // }
    echo "</pre>";
    echo "<br>";


}
//echo $data['order'];