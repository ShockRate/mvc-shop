<?php

require ROOT.'/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class retrieveExcel{
    var $worksheet;

    function __construct($fileName) {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $this->worksheet = $reader->load($fileName);  
    }

    function activeSheet(){
        return $this->worksheet->getActiveSheet();
    }

    function getCategoriesNames(){
        return $typesSheets = $this->worksheet->getSheetNames();
    }

    function getCategoriesSum(){
        return $this->worksheet->getSheetCount(); 
    }

    function getCategorybyName($name){
        return $this->worksheet->getSheetByName($name);
    }
    function getColumnHighestRow($col){
        return $this->worksheet->getActiveSheet()->getHighestRow($col);
    }
    function getCategoryHighestRow($name){
        return $this->worksheet->getSheetByName($name)->getHighestRow();

    }

    function getCellVal($name, $col, $row){
        return $this->worksheet->getSheetByName($name)->getCellByColumnAndRow($col,$row)->getValue();
    }

}
?>