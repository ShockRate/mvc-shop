<?php
class CustomerCtrl extends Controller{
  
    public function __construct($data = array()){
        parent::__construct($data);
        $this->model = new Customer();
        
    }

    public function index(){

        $this->data['customers'] = $this->model->getCustomerNames();
    }

    public function register(){

        if ($_POST) {

            $this->registerCustomer($_POST); 
            //$this->data['err'];
            if(!$this->data['err']['errors']){
                header('Location:'.ROOT_URL.'/customer');
                exit();
            }
        }    
    }

    public function registerCustomer($safePOST){

        $safePOST = array_map('trim', filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING));
        $this->data['err'] =  $this->model->registerCustomer($safePOST);
        
        
                     
    }
    
}
    


?>