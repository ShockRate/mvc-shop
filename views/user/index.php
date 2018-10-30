 <div class='container'>
    <button type="button" onClick="location.href='<?php echo ROOT_URL; ?>/user/register'"class="btn btn-warning">ΝΕΟΣ ΧΡΗΣΤΗΣ</button>
    <br>
    <br>
</div>
 <div class='container'>
  <table border='1' class='table'>
    <tr style='background: whitesmoke;'>
      <th>Σειριακό Αριθμός</th>
      <th>Username</th>
      <th>Επωνυμία</th>
      <th>Όνομα</th>
      <th>Email</th>
      <th>Ημερομηνία εγραφης</th>
      <!-- <th>Operation</th> -->
    </tr>

    <?php 
    

  
    foreach ($data['users'] as $user) {
       $id = $user['user_id'];
       $first_name = $user['first_name'];
       $last_name = $user['last_name'];
       $username = $user['username'];
       $email = $user['email'];
       $registration_date = $user['registration_date'];
       

    ?>
    <tr>
       <td align='center'><?= $id ?></td>
       <td><?= $username ?></td>
       <td><?= $last_name ?></td>
       <td><?= $first_name ?></td>
       <td><?= $email ?></td>
       <td><?= $registration_date ?></td>
       
       <!-- <td align='center'>
            <button class='delete btn btn-danger' id='del_<?= $id ?>'>Delete</button>
            <button class="load btn btn-warning" onClick="location.href='<?php echo BASE_URL; ?>customer/editCustomer/<?php echo $order['order_id']; ?>'">ΕΠΕΞΕΡΓΑΣΙΑ</button>
 
       </td> -->
    </tr>
    <?php
    
    }
    ?>
  </table>
</div>

 






