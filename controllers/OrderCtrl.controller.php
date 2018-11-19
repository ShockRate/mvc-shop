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
        require ROOT.'/vendor/autoload.php';
        $ordersheet = $this->model->download();
        $Excel_writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($ordersheet, 'Xlsx');
        ob_clean();
        
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="myfile.xlsx"'); /*-- $filename is  xsl filename ---*/
        header('Cache-Control: max-age=0');
        
        $Excel_writer->save('php://output');   
        exit();
        
    }

    public function download2(){
        
        require ROOT.'/vendor/autoload.php';

        //$sheet = new retrieveExcel(PRINT_SHEET);
        //$worksheet = $sheet->getSheet();

        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $sheet = $reader->load(PRINT_SHEET);  
        
        $worksheet = $this->model->download2($sheet);
        $Excel_writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($worksheet, 'Xlsx');
        ob_clean();
        
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="myTestfile.xlsx"'); /*-- $filename is  xsl filename ---*/
        header('Cache-Control: max-age=0');
        
        $Excel_writer->save('php://output');   
        exit();
        
    }
}
