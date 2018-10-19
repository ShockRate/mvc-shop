<?php
/** ===========================================================================================
 *  REGISTER NEW CUSTOMER FORM
 * ============================================================================================
 */
echo '<pre>';

print_r(isset($data['err'])?$data['err']:''); 
echo '</pre>';
?>
<fieldset>      
<div class="loginBox">
    
    <h2>Νεος Πελατης</h2>
    <?php echo isset($data['err']['msg'])?$data['err']['msg']:''; ?>
    <form action="<?php echo ROOT_URL;?>customer/register" method="POST">
            
        
        <div>
        <p>
            <label for = "first_name"> Όνομα: </label>
            <br>
            <span>
                <?php echo isset($data['err']['first_name'])?$data['err']['first_name']:'';?>
            </span>
            <input type="text" name="first_name" value ="<?php echo isset($safeData['first_name'])?$safeData['first_name']:'';?>"/>
            
        </p>
        <p>
            <label for = "last_name"> Επώνυμο: </label>
            <br>
            <span>
                <?php echo isset($data['err']['last_name'])?$data['err']['last_name']:'';?>
            </span>
            <input type="text" name="last_name" value ="<?php echo isset($safeData['last_name'])?$safeData['last_name']:'';?>"/>
        </p>
        </div>
        <p>
            <label for = "address">Διεύθυνση: </label>
            <br>
            <span>
                <?php echo isset($data['err']['address'])?$data['err']['address']:'';?>
            </span>
            <input type="text" name="address" value ="<?php echo isset($safeData['address'])?$safeData['address']:'';?>"/>
            
        </p>
        <p>
            <label for = "region">Περιοχή: </label>
            <br>
            <span>
                <?php echo isset($data['err']['region'])?$data['err']['region']:'';?>
            </span>
            <input type="text" name="region" value ="<?php echo isset($safeData['region'])?$safeData['region']:'';?>"/>
            
        </p>
        <p>
            <label for = "country">Χώρα: </label>
            <br>
            <span>
                <?php echo isset($data['err']['country'])?$data['err']['country']:'';?>
            </span>
            <input type="text" name="country" value ="<?php echo isset($safeData['country'])?$safeData['country']:'';?>"/>
            
        </p>
        <div>
        <p>
            <label for = "phone"> Τηλέφωνο: </label>
            <br>
            <span>
                <?php echo isset($data['err']['phone'])?$data['err']['phone']:'';?>
            </span>
            <input type="text" name="phone" value ="<?php echo isset($safeData['phone'])?$safeData['phone']:'';?>"/>
            
        </p>
        <p>
            <label for = "mobile"> Κινητό: </label>
            <br>
            <span>
                <?php echo isset($data['err']['mobile'])?$data['err']['mobile']:'';?>
            </span>
            <input type="text" name="mobile" value ="<?php echo isset($safeData['mobile'])?$safeData['mobile']:'';?>"/>
        </p>
        </div>
        <p>
            <label for = "email"> E-mail: </label>
            <br>
            <span>
                <?php echo isset($data['err']['email'])?$data['err']['email']:'';?>
            </span>
            <input type="text" name="email" value ="<?php echo isset($safeData['email'])?$safeData['email']:'';?>"/>
            
        </p>
        <p> 
            <input type='submit' name='register' value = Δημιουργία />
        </p>
        <span>
            <a href="<?php echo BASE_URL; ?>customer">Πίσω</a>
        </span>
    </form>
    
    </div>
    </fieldset>  


<?php 
	//require_once FOOTER;
?>
