<div class='container'>
    <button type="button" onClick="location.href='<?php echo BASE_URL; ?>order/createOrder'"class="btn btn-warning">ΝΕΑ ΠΑΡΑΓΓΕΛΙΑ</button>
</div>
<?php
echo "<pre>";
foreach ($data['order'] as $order) {
    echo $order;
    echo  '<br>';
 }
 echo "</pre>";
 ?>