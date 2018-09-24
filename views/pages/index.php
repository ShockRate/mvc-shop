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
foreach ($data['users'] as $user) {
   //print_r($user);
}
?>
<br>
<?//$data['test_content']; ?>
