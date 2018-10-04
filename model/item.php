<?php 
Class Item extends Model {

    
    public function newItem($safePOST){
                   
                $_SESSION['Cart'][] = array(

                     //"ID"           => $item->getId(),
                     "Type"         => $safePOST['productType'],
                     "Name"         => $safePOST['productName'],
                     "Class"        => $safePOST['productClass'],
                     "Width"        => $safePOST['width'],
                     "Height"       => $safePOST['height'],
                     "ClearWidth"   => $safePOST['width']-5,
                     "ClearHeight"  => $safePOST['height']-5,
                     "Sills"        => "images/shifts/UDLR.png",
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
    

    

    public function message(){
        return 'SUCCESSFULY CREATED';
    }
}
?>