<div class='container'>
    <button type="button" onClick="location.href='user/register'"class="btn btn-warning">ΝΕΟΣ ΧΡΗΣΤΗΣ</button>
</div>

<?php
echo "<pre>";
foreach ($data['users'] as $user) {
    print_r($user);
 }
echo "</pre>";
?>







