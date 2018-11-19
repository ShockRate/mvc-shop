<div class="container">
	
	<div class="block">
		<label>ΚΩΔΙΚΟΣ:</label>
		<span name ="orderId"><?php 
		if (isset($_SESSION['order'])) {
			echo $_SESSION['order']['ID'];
		}
		?></span>
		<label>ΠΕΛΑΤΗΣ:</label>
		<span name ="orderCustomer"><?php 
		if (isset($_SESSION['order'])) {
			echo $_SESSION['order']['Customer'];
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
		<label>¨Εγινε από :</label>
		<span name ="orderUser"><?php 
		if (isset($_SESSION['order'])) {
			echo $_SESSION['order']['User'];
		}
		?></span>
	</div>
	<div style="text-align: center;">
		<button type="button" onClick="location.href='<?php echo ROOT_URL;?>/order/clearorder'"class="btn btn-danger" id="clearTable">ΕΚΑΘΑΡΙΣΗ ΠΑΡΑΓΓΕΛΙΑΣ</button>
		<button type="button" onClick="location.href='<?php echo ROOT_URL;?>/order/saveorder'"class="btn btn-warning" id="clearTable">ΑΠΟΘΗΚΕΥΣΗ ΠΑΡΑΓΓΕΛΙΑΣ</button>				
		<!-- <button type="button" class="btn btn-warning" id="clearTable">ΕΚΑΘΑΡΙΣΗ ΠΑΡΑΓΓΕΛΙΑΣ</button> -->
	</div>
</div>