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
    public function viewCreateOrder(){
            $this->data['order'] = $this->model = new retrieveExcel(DATA);
    }

    public function createOrder(){
        if ($_POST) {
            // $_SESSION['order'] = array(
            //     "ID"        => time(),
            //     "Series"    => $_POST['series'], 
            //     "Glazzing"  => $_POST['glazzing'], 
            //     "Color"     => $_POST['color']
        
            // );
            $this->model->newOrder($_POST);
            header('Location:'.ROOT_URL.'/order');
            exit();
        }
    }
}
?>