<?php
//require_once HEADER;

/** ===========================================================================================
 *  REGISTER FORM
 * ============================================================================================
 */

?>
<fieldset>      
<div class="loginBox">
    
    <h2>Νεος Πελατης</h2>
    <form action="index.php?nav=register" method="POST">        
        
        <div>
        <p>
            <label for = "first_name"> Όνομα: </label>
            <br>
            <span>
                <?php echo isset($errors['first_name'])?$errors['first_name']:'';?>
            </span>
            <input type="text" name="first_name" value ="<?php echo isset($safeData['first_name'])?$safeData['first_name']:'';?>"/>
            
        </p>
        <p>
            <label for = "last_name"> Επώνυμο: </label>
            <br>
            <span>
                <?php echo isset($errors['last_name'])?$errors['last_name']:'';?>
            </span>
            <input type="text" name="last_name" value ="<?php echo isset($safeData['last_name'])?$safeData['last_name']:'';?>"/>
        </p>
        </div>
        <p>
            <label for = "address">Διεύθυνση: </label>
            <br>
            <span>
                <?php echo isset($errors['address'])?$errors['address']:'';?>
            </span>
            <input type="text" name="address" value ="<?php echo isset($safeData['address'])?$safeData['address']:'';?>"/>
            
        </p>
        <p>
            <label for = "area">Περιοχή: </label>
            <br>
            <span>
                <?php echo isset($errors['area'])?$errors['area']:'';?>
            </span>
            <input type="text" name="area" value ="<?php echo isset($safeData['area'])?$safeData['area']:'';?>"/>
            
        </p>
        <p>
            <label for = "country">Χώρα: </label>
            <br>
            <span>
                <?php echo isset($errors['country'])?$errors['country']:'';?>
            </span>
            <input type="text" name="country" value ="<?php echo isset($safeData['country'])?$safeData['country']:'';?>"/>
            
        </p>
        <div>
        <p>
            <label for = "phone"> Τηλέφωνο: </label>
            <br>
            <span>
                <?php echo isset($errors['phone'])?$errors['phone']:'';?>
            </span>
            <input type="text" name="phone" value ="<?php echo isset($safeData['phone'])?$safeData['phone']:'';?>"/>
            
        </p>
        <p>
            <label for = "mobile"> Κινητό: </label>
            <br>
            <span>
                <?php echo isset($errors['mobile'])?$errors['mobile']:'';?>
            </span>
            <input type="text" name="mobile" value ="<?php echo isset($safeData['mobile'])?$safeData['mobile']:'';?>"/>
        </p>
        </div>
        <p>
            <label for = "email"> E-mail: </label>
            <br>
            <span>
                <?php echo isset($errors['email'])?$errors['email']:'';?>
            </span>
            <input type="text" name="email" value ="<?php echo isset($safeData['email'])?$safeData['email']:'';?>"/>
            
        </p>
        <p> 
            <input type='submit' name='register' value = Δημιουργία />
        </p>
    </form>
    
    </div>
    </fieldset>  


<?php 
	//require_once FOOTER;
?>
