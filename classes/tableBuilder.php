<?php
class tableBuilder{
	protected $message = "";

	function __construct() {

}

  


  public function _printImg($type, $class, $dimCase1, $dimCase3, $dimCase5, $dimUp, $dimMiddle, $dimCase2, $dimCase4){
    if ($class == 2) {
      # code...
      $message = file_get_contents(VIEWS_PATH.DS.'order'.DS.'builder'.DS.'idxDualAction.php');
      $message = str_replace("_root", ROOT_URL ,$message);
      $message = str_replace("_imgSrc", $type ,$message);
      $message = str_replace("_dimCase1",(string)($dimCase1),$message);
      $message = str_replace("_dimCase2",(string)($dimCase2),$message);
    } elseif ($class == 3) {
      # code...
      $message = file_get_contents(VIEWS_PATH.DS.'order'.DS.'builder'.DS.'idxTripleAction.php');
      $message = str_replace("_imgSrc", $type ,$message);
      $message = str_replace("_dimCase1",(string)($dimCase1),$message);
      $message = str_replace("_dimCase2",(string)($dimCase2),$message);
      $message = str_replace("_dimCase3",(string)($dimCase3),$message);
    } elseif ($class == 4) {
      # code...
      $message = file_get_contents(VIEWS_PATH.DS.'order'.DS.'builder'.DS.'idxSingleActionSingleFgg.php');
      $message = str_replace("_imgSrc", $type ,$message);
      $message = str_replace("_dimUp",(string)($dimUp),$message);
      $message = str_replace("_dimMiddle",(string)($dimMiddle),$message);
    } elseif ($class == 5) {
      # code...
      $message = file_get_contents(VIEWS_PATH.DS.'order'.DS.'builder'.DS.'idxDualActionDualFgg.php');
      $message = str_replace("_imgSrc", $type ,$message);
      $message = str_replace("_dimCase1",(string)($dimCase1),$message);
      $message = str_replace("_dimCase2",(string)($dimCase2),$message);
      $message = str_replace("_dimUp",(string)($dimUp),$message);
      $message = str_replace("_dimMiddle",(string)($dimMiddle),$message);  
    } elseif ($class == 6) {
      # code...
      $message = file_get_contents(VIEWS_PATH.DS.'order'.DS.'builder'.DS.'idxDualActionSingleFgg.php');
      $message = str_replace("_imgSrc", $type ,$message);
      $message = str_replace("_dimCase1",(string)($dimCase1),$message);
      $message = str_replace("_dimCase2",(string)($dimCase2),$message);
      $message = str_replace("_dimUp",(string)($dimUp),$message);
      $message = str_replace("_dimMiddle",(string)($dimMiddle),$message);  
    } elseif ($class == 7) {
      # code...
      $message = file_get_contents(VIEWS_PATH.DS.'order'.DS.'builder'.DS.'idxDualActionDualFgg.php');
      $message = str_replace("_imgSrc", $type ,$message);
      $message = str_replace("_dimCase1",(string)($dimCase1),$message);
      $message = str_replace("_dimCase2",(string)($dimCase2),$message);
      $message = str_replace("_dimUp",(string)($dimUp),$message);
      $message = str_replace("_dimMiddle",(string)($dimMiddle),$message);   
     } elseif ($class == 8) {
      # code...
      $message = file_get_contents(VIEWS_PATH.DS.'order'.DS.'builder'.DS.'idxTripleActionSingleFgg.php');
      $message = str_replace("_imgSrc", $type ,$message);
      $message = str_replace("_dimCase1",(string)($dimCase1),$message);
      $message = str_replace("_dimCase2",(string)($dimCase2),$message);
      $message = str_replace("_dimCase3",(string)($dimCase3),$message);
      $message = str_replace("_dimUp",(string)($dimUp),$message);
      $message = str_replace("_dimMiddle",(string)($dimMiddle),$message);  
     } elseif ($class == 9) {
      # code...
      $message = file_get_contents(VIEWS_PATH.DS.'order'.DS.'builder'.DS.'idxTripleActionTripleFgg.php');
      $message = str_replace("_imgSrc", $type ,$message);
      $message = str_replace("_dimCase1",(string)($dimCase1),$message);
      $message = str_replace("_dimCase2",(string)($dimCase2),$message);
      $message = str_replace("_dimCase3",(string)($dimCase3),$message);
      $message = str_replace("_dimUp",(string)($dimUp),$message);
      $message = str_replace("_dimMiddle",(string)($dimMiddle),$message);  
     } elseif ($class == 11) {
      # code...
      $message = file_get_contents(VIEWS_PATH.DS.'order'.DS.'builder'.DS.'idxFixEntr.php');
      $message = str_replace("_imgSrc", $type ,$message);
      $message = str_replace("_dimCase1",(string)($dimCase1),$message);
      $message = str_replace("_dimCase2",(string)($dimCase2),$message);    
     } elseif ($class == 12) {
      # code...
      $message = file_get_contents(VIEWS_PATH.DS.'order'.DS.'builder'.DS.'idxEntrFix.php');
      $message = str_replace("_imgSrc", $type ,$message);
      $message = str_replace("_dimCase1",(string)($dimCase1),$message);
      $message = str_replace("_dimCase2",(string)($dimCase2),$message);
     } elseif ($class == 13) {
      # code...
      $message = file_get_contents(VIEWS_PATH.DS.'order'.DS.'builder'.DS.'idxFixEntrFix.php');
      $message = str_replace("_imgSrc", $type ,$message);
      $message = str_replace("_dimCase1",(string)($dimCase1),$message);
      $message = str_replace("_dimCase2",(string)($dimCase2),$message);
      $message = str_replace("_dimCase3",(string)($dimCase3),$message);
     } elseif ($class == 14) {
      # code...
      $message = file_get_contents(VIEWS_PATH.DS.'order'.DS.'builder'.DS.'idxFixEntrFixFgg.php');
      $message = str_replace("_imgSrc", $type ,$message);
      $message = str_replace("_dimCase1",(string)($dimCase1),$message);
      $message = str_replace("_dimCase2",(string)($dimCase2),$message);
      $message = str_replace("_dimCase3",(string)($dimCase3),$message);
      $message = str_replace("_dimUp",(string)($dimUp),$message);
      $message = str_replace("_dimMiddle",(string)($dimMiddle),$message); 
     } elseif ($class == 15) {
      # code...
      $message = file_get_contents(VIEWS_PATH.DS.'order'.DS.'builder'.DS.'idxQuadrableAction.php');
      $message = str_replace("_imgSrc", $type ,$message);
      $message = str_replace("_dimCase1",(string)($dimCase1),$message);
      $message = str_replace("_dimCase2",(string)($dimCase2),$message);     
      $message = str_replace("_dimCase3",(string)($dimCase3),$message);
      $message = str_replace("_dimCase4",(string)($dimCase4),$message);
    } else {
      $message = file_get_contents(VIEWS_PATH.DS.'order'.DS.'builder'.DS.'idxSingleAction.php');
      $message = str_replace("_imgSrc", $type ,$message);
    }

    
            return $message;
  }
}

?>

