<?php
class tableBuilder{
	protected $message = "";

	function __construct() {

}

  


  public function _printImg($type, $class, $dimCase1, $dimCase3, $dimCase5, $dimUp, $dimMiddle, $dimCase2, $dimCase4){
    if ($class == 2) {
      # code...
      $message = file_get_contents('./views/builder/idxDualAction.php');
      $message = str_replace("_imgSrc", $type ,$message);
      $message = str_replace("_dimCase1",(string)($dimCase1),$message);
      $message = str_replace("_dimCase2",(string)($dimCase2),$message);
    } elseif ($class == 3) {
      # code...
      $message = file_get_contents('./views/builder/idxTripleAction.php');
      $message = str_replace("_imgSrc", $type ,$message);
      $message = str_replace("_dimCase1",(string)($dimCase1),$message);
      $message = str_replace("_dimCase2",(string)($dimCase2),$message);
      $message = str_replace("_dimCase3",(string)($dimCase3),$message);
    } elseif ($class == 4) {
      # code...
      $message = file_get_contents('./views/builder/idxSingleActionSingleFgg.php');
      $message = str_replace("_imgSrc", $type ,$message);
      $message = str_replace("_dimUp",(string)($dimUp),$message);
      $message = str_replace("_dimMiddle",(string)($dimMiddle),$message);
    } elseif ($class == 5) {
      # code...
      $message = file_get_contents('./views/builder/idxDualActionDualFgg.php');
      $message = str_replace("_imgSrc", $type ,$message);
      $message = str_replace("_dimCase1",(string)($dimCase1),$message);
      $message = str_replace("_dimCase2",(string)($dimCase2),$message);
      $message = str_replace("_dimUp",(string)($dimUp),$message);
      $message = str_replace("_dimMiddle",(string)($dimMiddle),$message);  
    } elseif ($class == 6) {
      # code...
      $message = file_get_contents('./views/builder/idxDualActionSingleFgg.php');
      $message = str_replace("_imgSrc", $type ,$message);
      $message = str_replace("_dimCase1",(string)($dimCase1),$message);
      $message = str_replace("_dimCase2",(string)($dimCase2),$message);
      $message = str_replace("_dimUp",(string)($dimUp),$message);
      $message = str_replace("_dimMiddle",(string)($dimMiddle),$message);  
    } elseif ($class == 7) {
      # code...
      $message = file_get_contents('./views/builder/idxDualActionDualFgg.php');
      $message = str_replace("_imgSrc", $type ,$message);
      $message = str_replace("_dimCase1",(string)($dimCase1),$message);
      $message = str_replace("_dimCase2",(string)($dimCase2),$message);
      $message = str_replace("_dimUp",(string)($dimUp),$message);
      $message = str_replace("_dimMiddle",(string)($dimMiddle),$message);   
     } elseif ($class == 8) {
      # code...
      $message = file_get_contents('./views/builder/idxTripleActionSingleFgg.php');
      $message = str_replace("_imgSrc", $type ,$message);
      $message = str_replace("_dimCase1",(string)($dimCase1),$message);
      $message = str_replace("_dimCase2",(string)($dimCase2),$message);
      $message = str_replace("_dimCase3",(string)($dimCase3),$message);
      $message = str_replace("_dimUp",(string)($dimUp),$message);
      $message = str_replace("_dimMiddle",(string)($dimMiddle),$message);  
     } elseif ($class == 9) {
      # code...
      $message = file_get_contents('./views/builder/idxTripleActionTripleFgg.php');
      $message = str_replace("_imgSrc", $type ,$message);
      $message = str_replace("_dimCase1",(string)($dimCase1),$message);
      $message = str_replace("_dimCase2",(string)($dimCase2),$message);
      $message = str_replace("_dimCase3",(string)($dimCase3),$message);
      $message = str_replace("_dimUp",(string)($dimUp),$message);
      $message = str_replace("_dimMiddle",(string)($dimMiddle),$message);  
     } elseif ($class == 11) {
      # code...
      $message = file_get_contents('./views/builder/idxFixEntr.php');
      $message = str_replace("_imgSrc", $type ,$message);
      $message = str_replace("_dimCase1",(string)($dimCase1),$message);
      $message = str_replace("_dimCase2",(string)($dimCase2),$message);    
     } elseif ($class == 12) {
      # code...
      $message = file_get_contents('./views/builder/idxEntrFix.php');
      $message = str_replace("_imgSrc", $type ,$message);
      $message = str_replace("_dimCase1",(string)($dimCase1),$message);
      $message = str_replace("_dimCase2",(string)($dimCase2),$message);
     } elseif ($class == 13) {
      # code...
      $message = file_get_contents('./views/builder/idxFixEntrFix.php');
      $message = str_replace("_imgSrc", $type ,$message);
      $message = str_replace("_dimCase1",(string)($dimCase1),$message);
      $message = str_replace("_dimCase2",(string)($dimCase2),$message);
      $message = str_replace("_dimCase3",(string)($dimCase3),$message);
     } elseif ($class == 14) {
      # code...
      $message = file_get_contents('./views/builder/idxFixEntrFixFgg.php');
      $message = str_replace("_imgSrc", $type ,$message);
      $message = str_replace("_dimCase1",(string)($dimCase1),$message);
      $message = str_replace("_dimCase2",(string)($dimCase2),$message);
      $message = str_replace("_dimCase3",(string)($dimCase3),$message);
      $message = str_replace("_dimUp",(string)($dimUp),$message);
      $message = str_replace("_dimMiddle",(string)($dimMiddle),$message); 
     } elseif ($class == 15) {
      # code...
      $message = file_get_contents('./views/builder/idxQuadrableAction.php');
      $message = str_replace("_imgSrc", $type ,$message);
      $message = str_replace("_dimCase1",(string)($dimCase1),$message);
      $message = str_replace("_dimCase2",(string)($dimCase2),$message);     
      $message = str_replace("_dimCase3",(string)($dimCase3),$message);
      $message = str_replace("_dimCase4",(string)($dimCase4),$message);
    } else {
      $message = file_get_contents('./views/builder/idxSingleAction.php');
      $message = str_replace("_imgSrc", $type ,$message);
    }

    
            return $message;
  }
}

?>

