 <div class='container'>
    <button type="button" onClick="location.href='<?php echo ROOT_URL; ?>/customer/register'"class="btn btn-warning">ΝΕΟΣ ΠΕΛΑΤΗΣ</button>
    <br>
    <br>
</div>
 <div class='container'>
  <table border='1' class='table'>
    <tr style='background: whitesmoke;'>
      <th>Σειριακό Αριθμός</th>
      <th>Επωνυμία</th>
      <th>Όνομα</th>
      <th>Διεύθυνση</th>
      <th>Τηλέφωνο</th>
      <th>Κινητό</th>
      <th>Περιοχή</th>
      <th>Χώρα</th>
      <th>Operation</th>
    </tr>

    <?php 
    

  
    foreach ($data['customers'] as $customer) {
       $id = $customer['customer_id'];
       $first_name = $customer['first_name'];
       $last_name = $customer['last_name'];
       $address = $customer['address'];
       $phone = $customer['phone'];
       $mobile = $customer['mobile'];
       $region = $customer['region'];
       $country = $customer['country'];

    ?>
    <tr>
       <td align='center'><?= $id ?></td>
       <td><?= $last_name ?></td>
       <td><?= $first_name ?></td>
       <td><?= $address ?></td>
       <td><?= $phone ?></td>
       <td><?= $mobile ?></td>
       <td><?= $region ?></td>
       <td><?= $country ?></td>
       <td align='center'>
            <button class='delete btn btn-danger' id='del_<?= $id ?>'>Delete</button>
            <button class="load btn btn-warning" onClick="location.href='<?php echo BASE_URL; ?>customer/editCustomer/<?php echo $order['order_id']; ?>'">ΕΠΕΞΕΡΓΑΣΙΑ</button>
 
       </td>
    </tr>
    <?php
    
    }
    ?>
  </table>
</div>

 