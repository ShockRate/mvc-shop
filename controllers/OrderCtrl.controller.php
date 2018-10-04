<?php
class OrderCtrl extends Controller{
    private $customer;
    public function __construct($data = array()){
        parent::__construct($data);
        $this->model = new Order();
        $this->customer = new Customer();
        
    }
    public function index(){
        
        if (isset($_SESSION['order']) && !empty($_SESSION['order'])){
            header('Location:'.ROOT_URL.'/order/createorder');
            exit();
        } else{
            $this->data['order'] = $this->model->getOrders();  
        }
             
    }
    
    public function createOrder(){

        $this->data['customers'] = $this->customer->getCustomerNames();  
        if ($_POST) { 
            $this->model->newOrder($_POST);
            header('Location:'.ROOT_URL.'/order/createorder');
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