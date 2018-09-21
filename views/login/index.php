<?PHP
$page_title = "Log In Page";
$page_header_title = "Log In";
//require_once HEADER;
/** ===========================================================================================
 *  LOGIN FORM
 * ============================================================================================
 */
?>
		<h1>View login Created!</h1>
		<div class="loginBox">
			<img src="<?php echo ROOT_URL;?>/images/user.png" class="user">
			<h2>Log In Here</h2>
			<?php echo isset($msg)?$msg:''; ?>
			<form action="index.php" method="POST">
				<p>Email</p>
				<br>
				<span>
					<?php echo isset($errors['id'])?$errors['id']:'';?>
				</span>
				<input type="text" name="id" placeholder="Enter Email" value="<?php echo isset($id)?$id:'';?>">
				<p>Password</p>
				<br>
				<span>
					<?php echo isset($errors['password'])?$errors['password']:'';?>
				</span>
				<input type="password" name="password" placeholder="••••••"  value="<?php echo isset($pass)?$pass:'';?>">
				<input type="submit" name="login" value="Sign In">
				<span> 
					<a href="#">Forget Password</a>
					<a href="<?php echo BASE_URL; ?>login/register">Register</a>
				</span>
			</form>
		</div>

<?php 
	
	//require_once FOOTER;
?>