<?php
/** ===========================================================================================
 *  REGISTER FORM
 * ============================================================================================
 */
?>

<fieldset>      
<div class="loginBox">
    <img src="<?php echo ROOT_URL;?>/images/user.png" class="user">
    <h2>Register New User</h2>
    <?php echo isset($data['err']['msg'])?$data['err']['msg']:''; ?>
    <form action="<?php echo BASE_URL;?>user/register" method="POST">        
        <p>
            <label for = "email"> E-mail: </label>
            <br>
            <span>
                <?php echo isset($data['err']['email'])?$data['err']['email']:'';?>
            </span>
            <input type="text" name="email" value ="<?php echo isset($safeData['email'])?$safeData['email']:'';?>"/>
            
        </p>
        <div>
        <p>
            <label for = "first_name"> First Name: </label>
            <br>
            <span>
                <?php echo isset($data['err']['first_name'])?$data['err']['first_name']:'';?>
            </span>
            <input type="text" name="first_name" value ="<?php echo isset($safeData['first_name'])?$safeData['first_name']:'';?>"/>
            
        </p>
        <p>
            <label for = "last_name"> Last Name: </label>
            <br>
            <span>
                <?php echo isset($data['err']['last_name'])?$data['err']['last_name']:'';?>
            </span>
            <input type="text" name="last_name" value ="<?php echo isset($safeData['last_name'])?$safeData['last_name']:'';?>"/>
        </p>
        </div>
        <p>
            <label for = "username"> Username: </label>
            <br>
            <span>
                <?php echo isset($data['err']['username'])?$data['err']['username']:'';?>
            </span>
            <input type="text" name="username" value ="<?php echo isset($safeData['username'])?$safeData['username']:'';?>"/>
        </p>
        <p>
            <label for = "password"> Password: </label>
            <br>
            <span>
                <?php echo isset($data['err']['password'])?$data['err']['password']:'';?>
            </span>
            <input type="password" name="password" value ="<?php echo isset($safeData['password'])?$safeData['password']:'';?>"/>
        </p>
        <p>
            <label for = "cnfrmpassword"> Confirm Password: </label>
            <br>
            <span>
                <?php echo isset($data['err']['cnfrmpassword'])?$data['err']['cnfrmpassword']:'';?>
            </span>
            <input type="password" name="cnfrmpassword" value ="<?php echo isset($safeData['cnfrmpassword'])?$safeData['cnfrmpassword']:'';?>"/>
        </p>
        <p> 
            <input type='submit' name='register' value = 'Register' />
        </p>
        <span>
            <a href="<?php echo BASE_URL; ?>user">Πίσω</a>
        </span>
    </form>
    </div>
    </fieldset>  