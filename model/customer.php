<?php
Class Customer extends Model {

    public function getCustomers(){
        $sql = "select * from customers";
        $result=mysqli_query($this->db,$sql);
        $result->fetch_assoc();
        $this->db->close();
        unset($this->db);   
      
        return $result;
       // return $this->db->query($sql);
    }

    public function getCustomerNames(){
        $sql = "SELECT CONCAT_WS(' ',first_name,last_name) AS name FROM customers";  
        $result=$this->db->query($sql);
        $result=mysqli_query($this->db,$sql);

        while($row = $result->fetch_assoc()) {
            $name[] =$row['name'];
        }
        //$this->db->close();
        //unset($this->db);   
      
        return $name;
        
        //return $this->db->query($sql);
    }

    public function registerCustomer($safeData){

        $us = $pw = $e = $fn =$ln = FALSE;
       
        /** ===========================================================================================
         *  VALIDATING REGISTRATION CREDENTIALS
         * ============================================================================================
         */    
        $fn = $ln = $ad = $ph = $mb = $rg = $ct = $eb = FALSE;
        $errors  = array();
        $errors['msg'] = ' ';
        
        if (between($safeData['first_name'],2,20)) {
            # code...
            $fn = $this->db->real_escape_string($safeData['first_name']);
        } else {
            $errors['first_name'] = 'ΜΗ ΑΠΟΔΕΚΤΟ ΟΝΟΜΑ (ΠΡΕΠΕΙ ΝΑ ΕΙΝΑΙ ΜΕΤΑ 2 ΚΑΙ 20 ΧΑΡΑΚΤΗΡΕΣ)';
        }

        if (between($safeData['last_name'],2,40)) {
            # code...
            $ln = $this->db->real_escape_string($safeData['last_name']);
        } else {
            $errors['last_name'] = 'ΜΗ ΑΠΟΔΕΚΤΟ ΕΠΩΝΥΜΟ (ΠΡΕΠΕΙ ΝΑ ΕΙΝΑΙ ΜΕΤΑ 2 ΚΑΙ 40 ΧΑΡΑΚΤΗΡΕΣ)';
        }


       /* if (isset($safeData['email']) && !filter_var($safeData['email'],FILTER_VALIDATE_EMAIL) && !strlen($safeData['email'] <=80)) {
            # code...
            $errors['email'] = 'ΜΗ ΑΠΟΔΕΚΤH ΔΙΕΥΘΥΝΣΗ E-MAIL ';
            
        } else {
            $e = $this->db->real_escape_string($safeData['email']);
        }*/

        if (between($safeData['address'],0,80)) {
            # code...
            $ad = $this->db->real_escape_string($safeData['address']);
        } else {
            $errors['address'] = 'ΜΗ ΑΠΟΔΕΚΤH ΔΙΕΥΘYΝΣΗ (ΠΡΕΠΕΙ ΝΑ ΕΙΝΑΙ ΤΟ ΠΟΛΥ 80 ΧΑΡΑΚΤΗΡΕΣ)';
        }

        if (between($safeData['country'],0,30)) {
            # code...
            $ct = $this->db->real_escape_string($safeData['country']);
        } else {
            $errors['country'] = 'ΜΗ ΑΠΟΔΕΚΤΟ ΟΝΟΜΑ ΧΩΡΑΣ, ΔΟΚΙΜΑΣΤΕ ΛΙΓΟΤΕΡΟΥΣ ΧΑΡΑΚΤΗΡΕΣ';
        }

        if (between($safeData['region'],0,30)) {
            # code...
            $rg = $this->db->real_escape_string($safeData['region']);
        } else {
            $errors['region'] = 'ΜΗ ΑΠΟΔΕΚΤΟ ΟΝΟΜΑ ΠΕΡΙΟΧΗΣ, ΔΟΚΙΜΑΣΤΕ ΛΙΓΟΤΕΡΟΥΣ ΧΑΡΑΚΤΗΡΕΣ';
        }

        if (between($safeData['phone'],0,20)) {
            # code...
            $ph = $this->db->real_escape_string($safeData['phone']);
        } else {
            $errors['phone'] = 'ΜΗ ΑΠΟΔΕΚΤΟ ΝΟΥΜΕΡΟ ΤΗΛΕΦΩΝΟ';
        }

        if (between($safeData['phone'],0,20)) {
            # code...
            $ph = $this->db->real_escape_string($safeData['phone']);
        } else {
            $errors['phone'] = 'ΜΗ ΑΠΟΔΕΚΤΟ ΝΟΥΜΕΡΟ ΤΗΛΕΦΩΝΟ';
        }

        if (between($safeData['mobile'],0,20)) {
            # code...
            $mb = $this->db->real_escape_string($safeData['mobile']);
        } else {
            $errors['mobile'] = 'ΜΗ ΑΠΟΔΕΚΤΟ ΝΟΥΜΕΡΟ ΚΙΝΗΤΟΥ ΤΗΛΕΦΩΝΟ';
        }



        //INSERT INTO DATABASE
        if($fn && $ln){
            
            $query = "INSERT INTO customers"
                    ."(first_name, last_name, address, phone, mobile, entered_by, region, country)"
                    ."VALUES"
                    ."(?,?,?,?,?,?,?,?)";
            $eb = Auth::userName();
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('ssssssss',$fn,$ln,$ad,$ph,$mb,$eb,$rg,$ct);
            $stmt->execute();
            if($stmt->affected_rows == 1){
                $_SESSION['msg'] = '<p>Επιτυχης εγραφή νέου πελάτη.</p>'; 
                $errors['errors'] = FALSE;               
                $stmt->close();
                unset($stmt);
                $this->db->close();
                unset($this->db);
            }else{
                $errors['errors'] = TRUE;
                $errors['msg'] = '<p>System error occured,'
                                .'H εγραφή σας απέτυχε.'.$stmt->error.'</p>';
            }   
        } else {
            $errors['errors'] = TRUE;
        }
        return $errors;

    }
}
?>