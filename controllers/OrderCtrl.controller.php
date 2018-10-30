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

    public function saveOrder(){

        $this->model->save();
        header('Location:'.ROOT_URL.'/order/createorder');
        exit();
    }

    public function loadOrder(){
        
        $this->data['order'] = $this->model->load($this->params[0]);
        header('Location:'.ROOT_URL.'/order/createorder');
        exit();

    }

    public function clearOrder(){
        unset($_SESSION['order']);
        unset($_SESSION['Cart']);
        header('Location:'.ROOT_URL.'/order');
        exit();
    }

    public function download(){
        $this->model->download();
    }
}
?>