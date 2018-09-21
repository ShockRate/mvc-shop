<div class="container">
	
	<div class="block">
		<label>ΚΩΔΙΚΟΣ:</label>
		<span name ="orderId"><?php 
		if (isset($_SESSION['order'])) {
			echo $_SESSION['order']['ID'];
		}
		?></span>
		<label>ΣΕΙΡΑ:</label>
		<span name ="orderSeries"><?php 
		if (isset($_SESSION['order'])) {
			echo $_SESSION['order']['Series'];
		}
		?></span>
		<label>ΤΖΑΜΙΑ:</label>
		<span name ="orderGlazzing"><?php 
		if (isset($_SESSION['order'])) {
			echo $_SESSION['order']['Glazzing'];
		}
		?></span>
		<label>ΧΡΩΜΑ:</label>
		<span name ="orderColor"><?php 
		if (isset($_SESSION['order'])) {
			echo $_SESSION['order']['Color'];
		}
		?></span>
	</div>
</div>