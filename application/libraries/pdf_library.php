<?php
if (!defined('BASEPATH')) {exit('No direct script access allowed');}
//die(var_dump(__DIR__ ));
define ('DIR_IMG' , '/var/wwww/controlpanel-losn.mx/public_html/static/img/'); 
define ('DIR_FILE' , '/var/www/controlpanel-losn.mx/public_html/docs/pdf/'); 
class Pdf_library{

	 function pdf_do($html, $filename = 'ticket', $stream=TRUE, $orientation="portrait", $path=null ,$password = null, $return = false)  {
		//error_reporting(1);	
		require_once ('bin/vendor/autoload.php');
		/*	
			CONFIRGURACIón de papel 
			\Mpdf\Mpdf([]) 	-> landscape
			\Mpdf\Mpdf() 						-> portrait
		*/
		/* --   CONFIGURACIÓN DEL PDF */
		$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
		$fontDirs = $defaultConfig['fontDir'];

		$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
		$fontData = $defaultFontConfig['fontdata'];
		if($orientation == "portrait"){
			$mpdf = new \Mpdf\Mpdf([
				'format' => 'Letter',
			    'fontDir' => array_merge($fontDirs, [__DIR__ . '/custom/font/directory'] ),
			    'fontdata' => $fontData + [
			        "freesans" => [
			            'R' => "FreeSans.ttf",
			            'B' => "FreeSansBold.ttf",
			            'I' => "FreeSansOblique.ttf",
			        ],
			    ],
			    'default_font' 	=> 'freesans',
			    'tempDir' 		=> __DIR__ . '/custom/temp/dir/path',
			    'mode' 			=> 'utf-8'

			]);
		} else {
			$mpdf = new \Mpdf\Mpdf([
				'format' => 'Letter',
				'orientation' => 'L',
			    'fontDir' => array_merge($fontDirs, [__DIR__ . '/custom/font/directory'] ),
			    'fontdata' => $fontData + [
			        "freesans" => [
			            'R' => "FreeSans.ttf",
			            'B' => "FreeSansBold.ttf",
			            'I' => "FreeSansOblique.ttf",
			        ],
			    ],
			    'default_font' 	=> 'freesans',
			    'tempDir' 		=> __DIR__ . '/custom/temp/dir/path',
			    'mode' 			=> 'utf-8'

			]);
		}
		//$mpdf->showImageErrors = true;
		

		
		//$stylesheet = file_get_contents(__DIR__ . '/vendor/css/style.css');
		//die(var_dump($stylesheet));
		//$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
		//$mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
		$date = fancy_date(date ('Y-m-d'), 'w-d-m-y');
		$mpdf->SetHTMLHeader('<div style="width:100%; position:absolute; top: 0%; left:0%; z-index: 0; margin-bottom: 0;">
						<table style="width:95%; position: fixed; margin-top:0%; left: 0%; z-index:10;">
						    <tr>
						        <td align="left">
						        	<img src="'.base_url().'static/logo_pdf.png" style="width:200px; position: absolute; margin-left:2%;  display:block;"/>
						        </td>
						        <td align="right" style="font-size:16px;">'.$date.'</td>
						    </tr>
						</table>
				    
				  </div>');
		$mpdf->SetHTMLFooter('<div style="width:100%; position:absolute; bottom: 0%; left:0%; z-index: 0; margin-top: 0;">
				    <table style="width:95%; position: fixed; margin-top:0%; left: 10%; z-index:10;">
					    <tr>
					        <td align="right" style="font-size:16px;" >Pag. {PAGENO}/{nbpg}</td>
					    </tr>
					</table>
				  </div> ');
        $mpdf->WriteHTML($html);
		/* --   CREACIÓN  DEL PDF */

		if(!is_null($password))
		{
			$mpdf->SetProtection(array(), $password[0], $password[1]);
		}
		if(!$return ){
			$mpdf->Output($filename.'.pdf', \Mpdf\Output\Destination::INLINE);	
		} else {
			$mpdf->Output(DIR_FILE.$filename.'.pdf', \Mpdf\Output\Destination::FILE);	
			return DIR_FILE.$filename.'.pdf';
		}

		
		

	}

	function render($html,$filename)
    {
        
        $mpdf = new Pdf_library();
        $mpdf->showImageErrors = true;
        $mpdf->pdf_do($html,$filename , false, 'portrait',"pdf",NULL);
        exit; 
    }
}
