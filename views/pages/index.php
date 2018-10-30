<?php

echo $data['test_content'].'<br>';
echo $data['TEST'].'<br>';
print_r('Ok! Router was called with uri: /'.$data['router']->getUri());
echo "<br>"; 
echo "<pre>";
print_r('Route: '.$data['router']->getRoute().PHP_EOL); 
print_r('Controller: '.$data['router']->getController().PHP_EOL); 
print_r('Action to be called: '.$data['router']->getMethod_prefix().$data['router']->getAction().PHP_EOL); 
echo "Params: ";
print_r($data['router']->getParams());
echo DATA.' <br>';
//foreach ($_SESSION['Cart'] as $arr) { 
//foreach ($data['users'] as $user) {
foreach ($_SESSION['Cart'] as $cart) {
    //$exampleEncoded = json_encode($arr, JSON_UNESCAPED_UNICODE);
    //echo $exampleEncoded;
    
    print_r($cart['X-panelsArray']);
    echo ' <br>';
    //Decode the JSON string using json_decode.
    //$example = json_decode($exampleEncoded, true);
    //Do a var_dump, just to see the structure.
    //print_r($example);
    //echo $example['Series'];
}
echo "</pre>";

?>
<br>
<button type="button" onClick="location.href='<?php echo ROOT_URL;?>/pages/test'"class="btn btn-warning" id="clearTable">TEST</button>
<?//$data['test_content']; ?>
