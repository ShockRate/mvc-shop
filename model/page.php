<?php
Class Page extends Model{

    public function getUsers(){
        $sql = "select * from users";
        return $this->db->query($sql);
    }
    public function test(){

        //Encode $example array into a JSON string.
        $exampleEncoded = json_encode($_SESSION['Cart']);
 
        //Insert the string into a column
        $sql = "UPDATE `orders` SET `orderfile`='$exampleEncoded' WHERE order_id= 1";
        $this->db->query($sql);
        
    }
}
?>