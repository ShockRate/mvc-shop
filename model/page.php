<?php
Class Page extends Model{

    public function getUsers(){
        $sql = "select * from users";
        return $this->db->query($sql);
    }
}
?>