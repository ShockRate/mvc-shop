<?php
Class User extends Model{

    public function getUsers(){
        $sql = "select * from users";
        return $this->db->query($sql);
    }

    public function registerUser($safeData){
        $us = $pw = $e = $fn =$ln = FALSE;
       
        /** ===========================================================================================
         *  VALIDATING REGISTRATION CREDENTIALS
         * ============================================================================================
         */    
        $us = $pw = $e = $fn =$ln = FALSE;
        $errors  = array();
        $errors['msg'] = ' ';
        

        if (filter_var($safeData['email'],FILTER_VALIDATE_EMAIL) && strlen($safeData['email'] <=80)) {
            # code...
            $e = $this->db->real_escape_string($safeData['email']);
        } else {
            $errors['email'] = 'ΜΗ ΑΠΟΔΕΚΤH ΔΙΕΥΘΥΝΣΗ E-MAIL ';
        }

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

        if (between($safeData['username'],5,50)) {
            # code...
            $us = $this->db->real_escape_string($safeData['username']);
        } else {
            $errors['username'] = 'ΜΗ ΑΠΟΔΕΚΤΟ ΟΝΟΜΑ ΧΡΗΣΤΗ (ΠΡΕΠΕΙ ΝΑ ΕΙΝΑΙ ΜΕΤΑ 5 ΚΑΙ 50 ΧΑΡΑΚΤΗΡΕΣ)';
        }

        if (between($safeData['password'],8,20)) {
            # code...
            if($safeData['password'] == $safeData['cnfrmpassword']){
                $pw = $this->db->real_escape_string($safeData['password']);
            }else{
                $errors['cnfrmpassword'] = 'ΕΠΙΒΕΒΑΙΩΣΤΕ ΤΟ ΣΩΣΤΟ PASSWORD';
            }
        } else {
            $errors['password'] = 'ΜΗ ΑΠΟΔΕΚΤΟ PASSWORD (ΠΡΕΠΕΙ ΝΑ ΕΙΝΑΙ ΜΕΤΑ 8 ΚΑΙ 20 ΧΑΡΑΚΤΗΡΕΣ)';
        }

        // CHECKING IF CREDENTIALS ALREADY IN DATABASE
        if($us && $pw && $fn && $ln && $e){
            $taken = false;
            $query = "SELECT username, email FROM users WHERE username = ? || email = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('ss',$us, $e);
            $stmt->execute();
            $stmt->bind_result($cus,$ce);
            $stmt->fetch();
            if($us == $cus ){
                $taken = TRUE;
                $errors['username']='USERNAME ΗΔΗ ΚΑΑΤΧΩΡΗΜΕΝΟ. ΠΑΡΑΚΑΛΩ ΔΟΚΙΜΑΣΤΕ ΔΙΑΦΟΡΕΤΙΚΟ';
            }
            if ($e == $ce) {
                $taken = TRUE;
                $errors['email']='EMAIL ΗΔΗ ΚΑΑΤΧΩΡΗΜΕΝΟ. ΠΑΡΑΚΑΛΩ ΔΟΚΙΜΑΣΤΕ ΔΙΑΦΟΡΕΤΙΚΟ';
            }
        

            //INSERT INTO DATABASE AND SENDING CONFIRMATION MAIL
            if(!$taken){
                $query = "INSERT INTO users"
                        ."(username, first_name, last_name, email, salt, active, pin, registration_date)"
                        ."VALUES"
                        ."(?,?,?,?,?,?,AES_ENCRYPT(?,?),UTC_TIMESTAMP())";
                $salt = substr(md5(uniqid(rand())),-20); 
                //$active = substr(sha1(uniqid(rand())),-32);
                $active = NULL;
                $stmt = $this->db->prepare($query);
                $stmt->bind_param('ssssssss',$us,$fn,$ln,$e,$salt,$active,$pw,$salt);
                $stmt->execute();
                if($stmt->affected_rows == 1){
                    $body = "You have been registered to EPAL shop."
                            ."Please follow the link to our site in order to log in:\n\n";
                    $body .= BASE_URL;
                    mail($e, 'Registration Confirmation',$body,'From:'.ADMIN_EMAIL );
                    $_SESSION['msg'] = '<p>Ευχαριστουμε για την εγραφη.</p>'
                                        .'Ένα μήνυμα επιβεβαίωσης έχει σταλεί στο email του νέου χρήστη.';
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


            }else{ // ALREADY TAKEN
                $errors['errors'] = TRUE;
                $stmt->close();
                unset($stmt);
                $this->db->close();
                unset($this->db);
            } 
            
        }else{
            $errors['errors'] = TRUE;
        }
        return $errors;
    }
}

?>