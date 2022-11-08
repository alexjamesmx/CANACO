<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once ('bin/vendor/autoload.php');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer;
define ('DIRECTORIO' , '/var/wwww/controlpanel-losn.mx/public_html/docs/excel/'); 


class Excel_library
{
    public $writer;
    public  $name; 
    protected $ci;
    

    public function setFile(){
        //die (var_dump(__DIR__)); 
        return new Spreadsheet();
    }
    public function setFileName($data){
        $this->name = $data.'.xls'; 
    }
    public function setCell($obj, $cell, $data){
        $sheet = $obj->getActiveSheet();
        $sheet->setCellValue($cell, $data);
    }   
    public function excel_do($obj) {
        $this->writer = IOFactory::createWriter($obj, 'Xls');              
        $this->writer->save(DIRECTORIO.$this->name); 
        
    }
    
    public function download($obj,$html,$filter = NULL,$ajustar = null, $dir = null, $negrita = nul,$numberFormat = null){
      
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Html();
        $spreadsheet = $reader->loadFromString($html);
        
        if(!is_null($filter)){
            $spreadsheet->getActiveSheet()->setAutoFilter($filter);
        }
        if(!is_null($ajustar)){
            if(is_array($ajustar) ){
                for($i = 0; $i < count($ajustar) ; $i++){
                    $spreadsheet->getActiveSheet()->getColumnDimension($ajustar[$i])->setAutoSize(true);       
                }
            }
        }

        $styleArray = [
            'font' => [
                'bold' => true,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '00000000'],
                ],
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
                'rotation' => 90,
                'startColor' => [
                    'argb' => 'FFA0A0A0',
                ],
                'endColor' => [
                    'argb' => 'FFFFFFFF',
                ],
            ],
        ];
        $styleArray2 = [
            'font' => [
                'bold' => false,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
            ],
            
        ];

        //$spreadsheet->getActiveSheet()->getStyle('A1:G3')->getFill() ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID) ->getStartColor()->setARGB('FFFF0000');
        //$spreadsheet->getActiveSheet()->getStyle('A1:I3')->applyFromArray($styleArray);
        if(!is_null($negrita)){
            $spreadsheet->getActiveSheet()->getStyle($negrita)->applyFromArray($styleArray);
            //$spreadsheet->getActiveSheet()->setAutoFilter($negrita);
        }
        if(!is_null($numberFormat)){
        //$spreadsheet->getActiveSheet()->getStyle('A4:I100')->applyFromArray($styleArray2);
        // if(!is_null($negrita)){
            $spreadsheet->getActiveSheet()->getStyle($numberFormat)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
            //$spreadsheet->getActiveSheet()->setAutoFilter($negrita);
        }
        

        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');
        if(!is_null($dir)){
           //die(var_dump(DIRECTORIO.$dir.'/'.$this->name));
            $writer->save(DIRECTORIO.$dir.'/'.$this->name);     
        } else {
            $writer->save(DIRECTORIO.$this->name); 
        }
        
    }



}
/* End of file Excel_library.php */
/* Location: ./application/libraries/Excel_library.php */
