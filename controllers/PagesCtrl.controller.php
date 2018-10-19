<?php
class PagesCtrl extends Controller{

    public function __construct($data = array()){
        parent::__construct($data);
        $this->model = new Page();
       
    }
    public function index(){
        $this->data['logged'] = false;
        $this->data['test_content'] = '<h1>Here is the default page</h1>';
        $this->data['users'] = $this->model->getUsers();
        $this->data['router'] = App::getRouter();
        $this->data['TEST'] = '$this->model';
        
        
    }
    
    public function view(){

        $params = App::getRouter()->getParams();

        if (isset($params[0])){
            $alias = strtolower($params[0]);
            $this->data['content'] = "Here will be a page with '{$alias}' alias";
        } else {
            $this->data['content'] = "You didn't provide a Parameter to make an alias";
        }

    }
    public function test(){
        
        //$this->model->test();
        header('Location:'.ROOT_URL);
    }
}

?>