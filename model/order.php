<?php 
Class Order extends Model {

    public function getOrders(){
        $sql = "select * from orders";
        $this->db->set_charset("utf8");
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

    public function load($id){

        $sql = "SELECT order_id, created_by, customer, series, color, glazzing, orderfile FROM orders WHERE order_id = ?";
        $this->db->set_charset("utf8");
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('s',$id);
        $stmt->execute();
        $stmt->bind_result($id,$user,$cust,$ser, $col, $glz, $order);
        $stmt->fetch();
        $cart = json_decode($order, true);

        $_SESSION['order'] = array(
            "ID"        => $id,
            "Customer"  => (string)$cust, 
            "User"      => (string)$user,
            "Series"    => (string)$ser, 
            "Glazzing"  => (string)$glz, 
            "Color"     => (string)$col
        );

        if (isset ($_SESSION['Cart'])){
            unset($_SESSION['Cart']);
           
        }
       
        $item = array();
        foreach ($cart as $cartItem) {
           
            foreach ($cartItem as $key => $value) {
                # code...
                $item[$key] = $value;

            }
            $_SESSION['Cart'][] = $item;
            
        }   
        return array($id,$user,$cust, $order);
    }
    
    public function save(){

        //SAVE ORDER SESSION DATA TO VARIABLES
        $id   = $_SESSION['order']["ID"];
        $cust = (string)$_SESSION['order']["Customer"];
        $user = (string)$_SESSION['order']["User"];
        $ser  = $_SESSION['order']["Series"];
        $col  = (string)$_SESSION['order']["Color"];
        $glz  = (string)$_SESSION['order']["Glazzing"];
        $cart = (isset($_SESSION['Cart'])) ? json_encode($_SESSION['Cart'], JSON_UNESCAPED_UNICODE) : "" ;
        //$cart= json_encode($_SESSION['Cart'], JSON_UNESCAPED_UNICODE);
        $this->db->set_charset("utf8");
        $sql = "SELECT count(1)FROM orders WHERE order_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('s',$id);
        $stmt->execute();
        $stmt->bind_result($exist);
        $stmt->fetch();
        $stmt->close();
        unset($stmt);
       
        if($exist == 1){

            //CREATE UPDATE SQL QUERY
            $sql = "UPDATE `orders` SET "
            ."created_by= ?, "
            ."customer = ?, " 
            ."series = ?, "
            ."color = ?, "
            ."glazzing = ?, "
            ."orderfile = ? "
            ." WHERE order_id = ?";   
            
            //EXECUTE UPDATE SQL QUERY 
            
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param('sssssss',$user,$cust,$ser,$col,$glz,$cart,$id);
            $stmt->execute();
            //CHECK IF UPDATE SUCCEDED AND PRINT MESSAGE
            if($stmt->affected_rows == 1){
                $_SESSION['msg'] = '<p>Η παραγγέλεια σας αποθηκεύτηκε.</p>';
                                    
                $errors['errors'] = FALSE;      
                $stmt->close();
                unset($stmt);
                $this->db->close();
                unset($this->db);
            //PRINT ERROR MESSAGE IF UPDATE FAILED         
            } else {
                $errors['errors'] = TRUE;      
                $_SESSION['msg'] = '<p>System error occured,'
                            .'H άποθήκευση απέτυχε.'.$stmt->error.'</p>';
            }

            
        }else {
            //CREATE INSERT SQL QUERY
            $sql = "INSERT INTO orders"
                        ."(order_id, created_by, customer, series, color, glazzing, orderfile)"
                        ."VALUES"
                        ."(?,?,?,?,?,?,?)";
            //EXECUTE INSERT SQL QUERY             
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param('sssssss',$id,$user,$cust,$ser,$col,$glz,$cart);
            $stmt->execute();
            //CHECK IF INSERT SUCCEDED AND PRINT MESSAGE
            if($stmt->affected_rows == 1){
                $_SESSION['msg'] = '<p>Η παραγγέλεια σας αποθηκεύτηκε.</p>';
                                    
                $errors['errors'] = FALSE;      
                $stmt->close();
                unset($stmt);
                $this->db->close();
                unset($this->db);
            //PRINT ERROR MESSAGE IF INSERT FAILED    
            } else {
                $errors['errors'] = TRUE;      
                $_SESSION['msg'] = '<p>System error occured,'
                                .'H άποθήκευση απέτυχε.'.$stmt->error.'</p>';
            } 
        

        }
    }

    

    public function message(){
        return 'SUCCESSFULY CREATED';
    }
}
?>