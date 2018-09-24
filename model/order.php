<?php 
Class Order {

    protected $worksheet;
    

    public function __construct(){
        $this->worksheet = new retrieveExcel(DATA);

    }

    public function newOrder($safePOST){
        
        $_SESSION['order'] = array(
            "ID"        => time(),
            "Series"    => $safePOST['series'], 
            "Glazzing"  => $safePOST['glazzing'], 
            "Color"     => $safePOST['color']
    
        );
    }
    /**
     * Get the value of worksheet
     */ 
    public function getWorksheet()
    {
        return $this->worksheet;
    }
    
    public function message(){
        return 'SUCCESSFULY CREATED';
    }
}
?>