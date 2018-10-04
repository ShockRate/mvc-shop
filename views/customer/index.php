<div class='container'>
    <button type="button" onClick="location.href='<?php echo BASE_URL; ?>customer/register'"class="btn btn-warning">ΝΕΟΣ ΠΕΛΑΤΗΣ</button>
</div>
<?php
echo "<pre>";
foreach ($data['customers'] as $customer) {
    echo $customer;
    echo  '<br>';
 }
 echo "</pre>";
 ?>