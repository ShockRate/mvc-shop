<?php 
Class Item extends Model {

    
    public function newItem($safePOST){
                   
                $_SESSION['Cart'][] = array(

                     //"ID"           => $item->getId(),
                     "Type"         => $safePOST['productType'],
                     "Name"         => (string)$safePOST['productName'],
                     "Class"        => (string)$safePOST['productClass'],
                     "Width"        => $safePOST['width'],
                     "Height"       => $safePOST['height'],
                     "ClearWidth"   => $safePOST['width']-5,
                     "ClearHeight"  => $safePOST['height']-5,
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
                     "Pieces"       => "1",
                     "Color"        =>  $_SESSION['order']['Color'],
                     "Glazzing"     =>  $_SESSION['order']['Glazzing'],
                     "Series"       =>  $_SESSION['order']['Series'],
                     "dimCase1"     => " ",
                     "dimCase2"     => " ",
                     "dimCase3"     => " ",
                     "dimCase4"     => " ",
                     "dimCase5"     => " ",                   
                     "DimUp"        => " ",
                     "DimMiddle"    => " "

                    
                );      
            }
    

    public function setSills($safePOST){

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

    public function message(){
        return 'SUCCESSFULY CREATED';
    }
}
?>