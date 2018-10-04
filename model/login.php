<?php 
Class Login extends Model {

    private $msg ='';

    function loginUser($safePOST){
        
        $errors = array();
        //$safePOST = array_map('trim', filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING));
        $id = $this->db->real_escape_string($safePOST['id']);
        $pass = $this->db->real_escape_string($safePOST['password']);
        $valid = TRUE;
        $query = "SELECT AES_DECRYPT(pin, salt), active, user_level, user_id, "
                ."CONCAT_WS(' ',first_name,last_name) FROM users WHERE ";
        if (filter_var($id,FILTER_VALIDATE_EMAIL) && strlen($id <=80)) {
            $query .="email = ? limit 1";
        }else if(between($id, 5 , 50)){
            $query .="username = ? limit 1";
        }else{
            $errors['id'] = 'Παρακαλώ δωστε ένα έγκυρo email / username';
            $valid = FALSE;
        }
        if(!between($pass, 8, 20)){
            $errors['password'] = 'Παρακαλώ δώστε ένα εγκυρο password';
            $valid = FALSE;
        }
        if($valid){
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('s',$id);
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($realPass, $active, $user_level, $user_id, $full_name);
            $stmt->fetch();
            if($stmt->num_rows == 1){
                if($active == NULL){
                    if($realPass == $pass){
                        $_SESSION = array(
                            'user_id' => $user_id,
                            'user_level' => $user_level,
                            'full_name' => $full_name 
                        );
                        //header('Location:'.BASE_URL.'index.php');
                        //exit();
                    } else{
                        $this->msg = '<p>Λάθος Username η password! Παρακαλώ δοκιμάστε ξανά.'
                        .'αν δε θυμάστε το Username η το Password σας παρακλώ επικοινωνήσετε με τον Admin του συστήματος</p>';
                    }        
                } else {
                    $this->msg = '<p>O λογαριασμός σας δεν είναι ενεργός αυτή την στιγμή</p>';
                }
            } else {
                $this->msg = '<p>Δεν υπάρχει τέτοιος χρήστης στο σύστημα</p>';
            }
            $stmt->close();
            unset($stmt);
            $this->db->close();
            unset($this->db);        
        }
        return $errors;
    }

    function logoutUser(){
        if(isset($_SESSION['user_id'])){
            $_SESSION = array();
            unset($_SESSION['msg']);
            session_destroy();
            setcookie(session_name(),'',time()-3600);
           
        }
    }
    function msg(){
        return $this->msg;
    }

}