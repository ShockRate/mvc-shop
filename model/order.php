<?php 
Class Order extends Model {

    public function getOrders(){
        $sql = "select * from orders";
        return $this->db->query($sql);
    }

    
    public function newOrder($safePOST){
        
        $_SESSION['order'] = array(
            "ID"        => time(),
            "Customer"  => $safePOST['customer'], 
            "Series"    => $safePOST['series'], 
            "Glazzing"  => $safePOST['glazzing'], 
            "Color"     => $safePOST['color'],
            "User"      => Auth::userName()
    
        );
    }
    
    public function message(){
        return 'SUCCESSFULY CREATED';
    }
}
?>