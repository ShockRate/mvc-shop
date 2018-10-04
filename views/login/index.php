<?PHP
$page_title = "Log In Page";
$page_header_title = "Log In";
/** ===========================================================================================
 *  LOGIN FORM
 * ============================================================================================
 */
?>
		<h1>View login Created!</h1>
		<div class="loginBox">
			<img src="<?php echo ROOT_URL;?>/images/user.png" class="user">
			<h2>Log In Here</h2>
			<?php echo isset($data['msg'])?$data['msg']:''; ?>
			<!-- <form method="post" action="<?php //echo BASE_URL; ?>order/createorder"> -->
			<form method="POST" action="<?php echo BASE_URL;?>login/index">
				<p>Email</p>
				<br>
				<span>
					<?php echo isset($data['err']['id'])?$data['err']['id']:'';?>
				</span>
				<input type="text" name="id" placeholder="Enter Email" value="<?php echo isset($id)?$id:'';?>">
				<p>Password</p>
				<br>
				<span>
					<?php echo isset($data['err']['password'])?$data['err']['password']:'';?>
				</span>
				<input type="password" name="password" placeholder="••••••"  value="<?php echo isset($pass)?$pass:'';?>">
				<input type="submit" name="login" value="Sign In">
				<span> 
					<a href="#">Forget Password</a>
				</span>
			</form>
		</div>

<?php 
	

?>