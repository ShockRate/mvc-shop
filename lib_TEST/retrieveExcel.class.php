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

    /*
    Function responsible for copying the cells modifications from the “Prototype” file as many time as the items in order
    */
    function pushRows($srcRow,$dstRow,$height,$width) {
        $sheet = $this->worksheet;
        for ($row = 0; $row < $height; $row++) {
               for ($col = 0; $col < $width; $col++) {
                $cell = $sheet->getCellByColumnAndRow($col, $srcRow + $row);
                $style = $sheet->getStyleByColumnAndRow($col, $srcRow + $row);
                //$dstCell = PHPExcel_Cell::stringFromColumnIndex($col) . (string)($dstRow + $row);
                $dstCell = Coordinate::stringFromColumnIndex($col) . (string)($dstRow + $row);
                $sheet->setCellValue($dstCell, $cell->getValue());
                $sheet->duplicateStyle($style, $dstCell);
            }

            $h = $sheet->getRowDimension($srcRow + $row)->getRowHeight();
            $sheet->getRowDimension($dstRow + $row)->setRowHeight($h);
        }

        foreach ($sheet->getMergeCells() as $mergeCell) {
            $mc = explode(":", $mergeCell);
            $col_s = preg_replace("/[0-9]*/", "", $mc[0]);
            $col_e = preg_replace("/[0-9]*/", "", $mc[1]);
            $row_s = ((int)preg_replace("/[A-Z]*/", "", $mc[0])) - $srcRow;
            $row_e = ((int)preg_replace("/[A-Z]*/", "", $mc[1])) - $srcRow;

            if (0 <= $row_s && $row_s < $height) {
                $merge = $col_s . (string)($dstRow + $row_s) . ":" . $col_e . (string)($dstRow + $row_e);
                $sheet->mergeCells($merge);
            } 
        }
    }

    function imageWidth($panels){
        return ($panels*35)+25;
    }
    //ADDS PRODUCT IMAGE TO EXCEL 
    public function addImage($panels,$path,$name,$coordinates,$sheet){
        $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
        $drawing->setPath($path);
        $drawing->setName($name);
        $drawing->setCoordinates($coordinates);
        $drawing->setOffsetX(10);
        $drawing->setOffsetY(10);
        $drawing->setResizeProportional(false);
        $drawing->setHeight(100);
        $drawing->setWidth($this->productWIdth($panels));
        $drawing->setWorksheet($sheet);
    }
    //ADDS SILLS IMAGE TO EXCEL
    public function addSillImage($path,$name,$coordinates,$sheet){
        $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
        $drawing->setPath($path);
        $drawing->setName($name);
        $drawing->setCoordinates($coordinates);
        $drawing->setOffsetX(2);
        $drawing->setOffsetY(2);
        $drawing->setHeight(85);
        $drawing->setWorksheet($sheet);
    }
    
}
?>