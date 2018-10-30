<?php 
Class Item extends Model {

    
    public function newItem($safePOST){
                   
        $_SESSION['Cart'][] = array(

                //"Index"        => count($_SESSION['Cart'])+1,
                "Type"         => $safePOST['productType'],
                "Name"         => (string)$safePOST['productName'],
                "Class"        => (string)$safePOST['productClass'],
                "Width"        => $safePOST['width'],
                "Height"       => $safePOST['height'],
                "ClearWidth"   => $safePOST['width']-5,
                "ClearHeight"  => $safePOST['height']-5,
                "Pieces"       => $safePOST['pieces'],
                "Sills"        => ROOT_URL."/public/images/shifts/UDLR.gif",
                "Profile"      => "",
                "Shutters"     => "",
                "Slats"        => "",
                "Mechanism"    => "",
                "Screens"      => "",
                "DetailsNotes" => "",
                "SillUp"       => "2.5",
                "SillDown"     => "2.5",
                "SillLeft"     => "2.5",
                "SillRight"    => "2.5",
                "Color"        => $_SESSION['order']['Color'],
                "Glazzing"     => $_SESSION['order']['Glazzing'],
                "Series"       => $_SESSION['order']['Series'],
                "X-panels"     => $safePOST['productXPanels'],
                "Y-panels"     => $safePOST['productYPanels'],
                "X-panelsArray"=> array_fill(0, $safePOST['productXPanels'], ""),
                "Y-panelsArray"=> array_fill(0, $safePOST['productYPanels']+1, ""),
                "dimCase1"     => " ",
                "dimCase2"     => " ",
                "dimCase3"     => " ",
                "dimCase4"     => " ",
                "dimCase5"     => " ",                   
                "DimUp"        => " ",
                "DimMiddle"    => " "
        );      
    }
    
    public function load($id){
        return $_SESSION['Cart'][$id-1];
    }

    public function delete($safePOST){
        $windowIndex  = $safePOST['windowIndex'] -1;
        array_splice($_SESSION['Cart'],$windowIndex,1);

    }

    public function updateItemSills($safePOST){

        $sillIndex = $safePOST['sillIndex']-1;
        $sillsImageSrc = $safePOST['sillsImageSrc'];
        $sillLeft = $safePOST['sillLeft'];
        $sillRight = $safePOST['sillRight'];
        $sillUp = $safePOST['sillUp'];
        $sillDown = $safePOST['sillDown'];

        $_SESSION['Cart'][$sillIndex]['Sills'] = $sillsImageSrc;
        $_SESSION['Cart'][$sillIndex]['SillLeft'] = $sillLeft;
        $_SESSION['Cart'][$sillIndex]['SillRight'] = $sillRight;
        $_SESSION['Cart'][$sillIndex]['SillUp'] = $sillUp;
        $_SESSION['Cart'][$sillIndex]['SillDown'] = $sillDown;
        $_SESSION['Cart'][$sillIndex]['ClearWidth'] = $_SESSION['Cart'][$sillIndex]['Width'] - $sillLeft - $sillRight;
        $_SESSION['Cart'][$sillIndex]['ClearHeight'] = $_SESSION['Cart'][$sillIndex]['Height'] - $sillUp - $sillDown;;

        $_SESSION['index'] = 0;

    }

    

    public function updateItemDetails($safePOST, $index){

        //SET MINIMUN AND MAXIMUM VALUES FOR HEIGHT AND WIDTH
        $maxWidth = 10000;
        $minWidth = 50;
        $maxHeight = 5000;
        $minHeight = 50;

        $error 			= false;
        $warning		= false;
        $alertMSG	   	= null;
        $MSG			= null;

        $windowIndex 	= $index-1;

        $shutters  		= $safePOST['shutters'];
        $slats  		= $safePOST['slats'];
        $mechanism  	= $safePOST['mechanism'];
        $screens   		= $safePOST['screens'];
        $profiles  		= $safePOST['profiles'];
        $detailsNotes  	= $safePOST['detailsNotes'];
        $pieces  		= $safePOST['pieces'];

        $width			= $safePOST['width'];
        $height			= $safePOST['height'];
        $clearWidth		= $safePOST['clearWidth'];
        $clearHeight	= $safePOST['clearHeight'];
        
        $dimXarray		= array();
        $dimYarray		= array();
        $dimWidthSum 	= 0;
        $dimHeightSum	= 0;
        
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
        
        for ($i=0; $i < $_SESSION['Cart'][$windowIndex]['X-panels']; $i++) { 
           // $dimXarray[] = $_POST['dimX'.$i];
            $dimWidthSum += $_POST['dimX'.$i];
        }
        for ($i=0; $i < $_SESSION['Cart'][$windowIndex]['Y-panels']; $i++) { 
            //$dimYarray[] = $_POST['dimY'.$i];
            $dimHeightSum += $_POST['dimY'.$i];
        }

        if($dimWidthSum > $clearWidth){
            $MSG    .= 'ΤΑ ΕΠΙΜΕΡΟΥΣ ΦΑΡΔΗ ΕΙΝΑΙ ΜΕΓΑΛΥΤΕΡΑ ΑΠΌ ΤΟ ΟΛΙΚΟ<br>';
            $error = true;
        } else {
            for ($i=0; $i < $_SESSION['Cart'][$windowIndex]['X-panels']; $i++) { 
                $_SESSION['Cart'][$windowIndex]['X-panelsArray'][$i] = returnNonZero($_POST['dimX'.$i]);
            }
        }
        
        if($dimHeightSum > $clearHeight){
            $MSG    .= 'ΤΑ ΕΠΙΜΕΡΟΥΣ ΥΨΗ ΕΙΝΑΙ ΜΕΓΑΛΥΤΕΡΑ ΑΠΌ ΤΟ ΟΛΙΚΟ<br>';		
            $error = true;
        } else {
            for ($i=0; $i < $_SESSION['Cart'][$windowIndex]['Y-panels']; $i++) { 
                $_SESSION['Cart'][$windowIndex]['Y-panelsArray'][$i] = returnNonZero($_POST['dimY'.$i]);
            }			
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

         //return $alertMSG;
         $_SESSION['MSG'] =$alertMSG;
    } //END OF updateItemDetails function

    public function getSessionCart($index, $part){
        return $_SESSION['Cart'][$index][$part];
    }
    
}
?>