<?php  
	session_start();

//DECLARE VARIABLES AN INITIALIZE VALUES FROM DETAILS FORM
	$windowIndex 	= $_POST['windowIndex'] -1;

	$shutters  		= $_POST['shutters'];
	$slats  		= $_POST['slats'];
	$mechanism  	= $_POST['mechanism'];
	$screens   		= $_POST['screens'];
	$profiles  		= $_POST['profiles'];
	$detailsNotes  	= $_POST['detailsNotes'];
	$pieces  		= $_POST['pieces'];

	$width			= $_POST['width'];
	$height			= $_POST['height'];
	$clearWidth		= $_POST['clearWidth'];
	$clearHeight	= $_POST['clearHeight'];

	$dimCase1  		= $_POST['dimCase1'];
	$dimCase2  		= $_POST['dimCase2'];
	$dimCase3  		= $_POST['dimCase3'];
	$dimCase4  		= $_POST['dimCase4'];
	$dimCase5  		= $_POST['dimCase5'];
 	
 	$dimUp  		= $_POST['dimUp'];
	$dimMiddle  	= $_POST['dimMiddle'];
	
	$dimXarray		= array();
	$dimYarray		= array();
	$dimWidthSum 	= 0;
	$dimHeightSum	= 0;
	
	
	for ($i=0; $i < $_SESSION['Cart'][$windowIndex]['X-panels']; $i++) { 
		$dimXarray[] = $_POST['dimX'.$i];
		$dimWidthSum += $_POST['dimX'.$i];
	}
	for ($i=0; $i < $_SESSION['Cart'][$windowIndex]['Y-panels']; $i++) { 
		$dimYarray[] = $_POST['dimY'.$i];
		$dimHeightSum += $_POST['dimY'.$i];
	}
	//SET MINIMUN AND MAXIMUM VALUES FOR HEIGHT AND WIDTH
	$maxWidth = 10000;
	$minWidth = 50;
	$maxHeight = 5000;
	$minHeight = 50;

	$error 			= false;
	$warning		= false;
	$alertMSG	   	= null;
	$MSG			= null;
	

	function returnNonZero($myVal){
		if($myVal == 0)
			return " ";
		else return $myVal; 

	}
	// ΠΕΡΝΑΜΕ ΤΙΜΕΣ ΤΩΝ DROPDOWN MENU ΣΤΟ SESSION
		$_SESSION['Cart'][$windowIndex]['Shutters']			= $shutters;
		$_SESSION['Cart'][$windowIndex]['Slats']			= $slats;
		$_SESSION['Cart'][$windowIndex]['Mechanism']		= $mechanism;
		$_SESSION['Cart'][$windowIndex]['Screens']  		= $screens;
		$_SESSION['Cart'][$windowIndex]['Profile']  		= $profiles;
		$_SESSION['Cart'][$windowIndex]['DetailsNotes'] 	= $detailsNotes;
		$_SESSION['Cart'][$windowIndex]['Pieces'] 			= $pieces;

		
	//ΕΛΕΓΧΟΣ ΑΝ ΟΙ ΤΙΜΕΣ ΠΟΥ ΔΙΝΕΙ Ο ΧΡΗΣΤΗΣ ΕΙΝΑΙ ΑΠΟΔΕΚΤΕΣ
	if ($clearWidth>$width) {
		$MSG    .= 'ΤΟ ΚΑΘΑΡΟ ΦΑΡΔΟΣ ΕΙΝΑΙ ΜΕΓΑΛΥΤΕΡΟ ΑΠO ΤΟ ΚΑΝΟΝΙΚΟ<br>';
		$error = true;
	} else {
		$_SESSION['Cart'][$windowIndex]['Width'] 			= $width;
		$_SESSION['Cart'][$windowIndex]['ClearWidth'] 		= $clearWidth;
	}
	if ($clearHeight>$height) {
		$MSG    .= 'ΤΟ ΚΑΘΑΡΟ ΦΑΡΔΟΣ ΕΙΝΑΙ ΜΕΓΑΛΥΤΕΡΟ ΑΠO ΤΟ ΚΑΝΟΝΙΚΟ<br>';
		$error = true;
	} else {
		$_SESSION['Cart'][$windowIndex]['Height'] 			= $height;
		$_SESSION['Cart'][$windowIndex]['ClearHeight'] 		= $clearHeight;
	}
	if($dimWidthSum > $clearWidth){
		$MSG    .= 'ΤΑ ΕΠΙΜΕΡΟΥΣ ΦΑΡΔΗ ΕΙΝΑΙ ΜΕΓΑΛΥΤΕΡΑ ΑΠΌ ΤΟ ΟΛΙΚΟ<br>';
		$error = true;
	} else {
		$_SESSION['Cart'][$windowIndex]['dimCase1']			=returnNonZero($dimCase1); 
		$_SESSION['Cart'][$windowIndex]['dimCase2']			=returnNonZero($dimCase2);  	 		
		$_SESSION['Cart'][$windowIndex]['dimCase3']			=returnNonZero($dimCase3);  
		$_SESSION['Cart'][$windowIndex]['dimCase4']			=returnNonZero($dimCase4);  	
		$_SESSION['Cart'][$windowIndex]['dimCase5']			=returnNonZero($dimCase5); 		
	}
	
	if($dimHeightSum > $clearHeight){
		$MSG    .= 'ΤΑ ΕΠΙΜΕΡΟΥΣ ΥΨΗ ΕΙΝΑΙ ΜΕΓΑΛΥΤΕΡΑ ΑΠΌ ΤΟ ΟΛΙΚΟ<br>';		
		$error = true;
	} else {
		$_SESSION['Cart'][$windowIndex]['DimUp']			=returnNonZero($dimUp);  		
 		$_SESSION['Cart'][$windowIndex]['DimMiddle']		=returnNonZero($dimMiddle);  			
	}

	if ($clearWidth < $minWidth || $clearWidth > $maxWidth) {
		# code...
		$MSG .= 'ΜΗ ΣΥΜΒΑΤΙΚΑ ΜΕΤΡΑ ΦΑΡΔΟΥΣ. ΠΑΡΑΚΑΛΩ ΕΠΙΚΟΙΝΩΝΗΣTΕ ΜΕ ΣΥΝΕΡΓΑΤΗ<br>';
		$warning		= true;
	}
	if ($clearHeight < $minHeight || $clearHeight > $maxHeight) {
		# code...
		$MSG .= 'ΜΗ ΣΥΜΒΑΤΙΚΑ ΜΕΤΡΑ ΥΨΟΥΣ. ΠΑΡΑΚΑΛΩ ΕΠΙΚΟΙΝΩΝΗΣΕ ΜΕ ΣΥΝΕΡΓΑΤΗ<br>';
		$warning		= true;
	}
 	
	
 	
 	if ( $error == true) {
		$alertMSG .= '<div class="alert alert-danger fade in">ΕΝΗΜΕΡΩΣΗ ΑΠΕΤΥΧΕ<br>'.$MSG.'</div>';
	 } elseif ($warning == true && $error == false ) {
		$alertMSG .= '<div class="alert alert-warning fade in">ΕΝΗΜΕΡΩΣΗ ΕΠΙΤΥΧΗΣ ΑΛΛΑ ΧΡΕΙΑΖΟΝΤΑΙ ΔΙΕΥΚΡΙΝΗΣΕΙΣ<br>'.$MSG.'</div>';
	 }	else {
		$alertMSG .= '<div class="alert alert-success fade in">ΕΝΗΜΕΡΩΣΗ ΕΠΙΤΥΧΗΣ'.'<br>'.$MSG.'</div>';
	 } 	
	 
	 
	 echo $alertMSG;

?>
