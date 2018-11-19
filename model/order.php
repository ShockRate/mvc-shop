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

    public function download(){
       $sheet = new retrieveExcel(PRINT_SHEET);
       $order = $sheet->activeSheet();
       $index 	= 5;
       $pushval = 5;
       $counter = 1;
       for ($i=0; $i < (sizeof($_SESSION['Cart'])-1); $i++) {   
            $sheet->pushRows(5, 3+$pushval, 3, 24);
            $pushval = $pushval +3;
        }
        foreach ($_SESSION['Cart'] as $arr) { 
            $order->setCellValue('A'.$index, $counter);
            $counter++;
            $order->setCellValue('C'.$index , $arr['Name'])->getStyle('J'.$index)->getFont()->setBold(true);
            //$order->getActiveSheet()->setCellValue('J'.$index , $arr['Type'])->getStyle('J'.$index)->getFont()->setBold(true);
            $order->setCellValue('G'.$index, $arr['Width'].' '."\r\n".' '.$arr['Height'] );
            $order->setCellValue('K'.$index, $arr['ClearWidth'].' '."\r\n".' '.$arr['ClearHeight'] );
            $order->setCellValue('Q'.$index , $arr['Profile']);
            $order->setCellValue('T'.($index+1) , $arr['Shutters']);
            $order->setCellValue('Q'.($index+1) , $arr['Screens']);
            //ADD PRODUCT IMAGE AND DIMENSIONS
            $sheet->addImage($arr['X-panels'],'../public/images/'.$arr['Type'].'.jpg',$arr['Type'].'jpg','M'.$index,$sheet->ActiveSheet());
            
            //Add siils
            
            //$order->addSillImage(''.$arr['Sills'],$arr['Sills'],'I'.($index+1),$order->ActiveSheet());
            $sheet->addSillImage('../public'.substr($arr['Sills'],strlen(ROOT_URL)),$arr['Sills'],'I'.($index+1),$sheet->ActiveSheet());
            $order->setCellValue('I'.$index , $arr['SillUp']);
            $order->setCellValue('I'.($index+2) , $arr['SillDown']);
            $order->setCellValue('H'.($index+1) , $arr['SillLeft']);
            $order->setCellValue('J'.($index+1) , $arr['SillRight']);
            //Details 
            $order->setCellValue('W'.($index) , $arr['Slats']."\n".$arr['Mechanism']."\n".$arr['DetailsNotes']);
            $index=$index+3;
            if ($counter % 5 == 0 && $counter <7){
                $order->setBreak('A'.($index+2), \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet::BREAK_ROW);
                }elseif(($counter-5)%7 ==0){
                    $order->setBreak('A'.($index+2), \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet::BREAK_ROW);
                }
            
        }
        return $sheet->getSheet();
        	
    }
    public function download2($sheet){
        //$sheet = new retrieveExcel(PRINT_SHEET);
        //return $sheet->getSheet();
        return $sheet;
    }

    public function message(){
        return 'SUCCESSFULY CREATED';
    }
}
?>