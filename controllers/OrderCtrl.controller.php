<?php
class OrderCtrl extends Controller{

    public function __construct($data = array()){
        parent::__construct($data);
        $this->model = new Order();
       
    }
    public function index(){
       
            $this->data['MSG'] = $this->model;
            $this->data['order'] = $this->model->getWorksheet();
      
    }
    
    public function createOrder(){
        if ($_POST) {
            
            $this->model->newOrder($_POST);
            header('Location:'.ROOT_URL.'/order');
            exit();
        }
    }
    public function deleteOrder(){
        unset($_SESSION['order']);
        header('Location:'.ROOT_URL.'/order');
        exit();
    }
}
?>