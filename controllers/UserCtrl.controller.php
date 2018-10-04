<?php
class UserCtrl extends Controller{
    
    public function __construct($data = array()){
        parent::__construct($data);
        $this->model = new User();
        
    }

    public function index(){

        $this->data['users'] = $this->model->getUsers();
    }

    public function register(){

        if ($_POST) {

            $this->registerUser($_POST); 
            $this->data['err'];
            if(!$this->data['err']['errors']){
                header('Location:'.ROOT_URL.'/user');
                exit();
            }          
        }
    }
    
    public function registerUser($safePOST){
       
        $safePOST = array_map('trim', filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING));
        $this->data['err'] =  $this->model->registerUser($safePOST);
        
        
    }
}

?>