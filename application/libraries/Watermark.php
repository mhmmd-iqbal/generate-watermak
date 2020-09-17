<?php defined('BASEPATH') OR exit('No direct script access allowed');
	use setasign\Fpdi\Fpdi;
	/**
	 * 
	 */
	class Watermark{		
		function __construct(){
			require_once(APPPATH. 'libraries/fpdf/fpdf.php');
			require_once(APPPATH. 'libraries/fpdi/src/autoload.php');
		}

		public function duplicate($name){
			$pdf = new Fpdi();
			$fullPathToFile = 'assets/upload/'.$name;
			$pagecount = $pdf->setSourceFile($fullPathToFile);
			ob_start();
			for ($i=1; $i <= $pagecount; $i++) {
					$pdf->AddPage();
			        $pdf->SetFont("helvetica", "B", 30);
			        $pdf->SetTextColor(255, 140, 140);
			        $pdf->Text(75, 150,"TAKE FROM");
			        $pdf->Text(55, 165,"PT PERTA ARUN GAS");
			        // $pdf->Image('assets/watermark.png', 40, 140, 90, 30);
			        $tplidx = $pdf->ImportPage($i);
			        $pdf->useTemplate($tplidx,10, 10, 200);
			}
			// $pdf->Output('assets/upload/'.$name, 'I');
			$pdf->Output('assets/upload/'.$name, 'F');
			ob_end_flush(); 
		}

	}
?>