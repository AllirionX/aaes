<?php
if(!isset($_GET['deck'])) {echo "error";} else {$deck=$_GET['deck'];}
//============================================================+
// File name   : example_001.php
// Begin       : 2008-03-04
// Last Update : 2010-08-14
//
// Description : Example 001 for TCPDF class
//               Default Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com s.r.l.
//               Via Della Pace, 11
//               09044 Quartucciu (CA)
//               ITALY
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Default Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */

require_once('../config/lang/eng.php');
require_once('../tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Simon et Lilian Chiassaï-Polin');
$pdf->SetTitle('Deck');
$pdf->SetSubject('CERVEAUUU');
$pdf->SetKeywords('');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
$pdf->setLanguageArray($l);

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('times', '', 11, '', false);

// Add a page
// This method has several options, check the source code documentation for more information.


// Set some content to print
$html='';

function accents ($ligne) {

$writing='';
				$longueur=strlen($ligne)-1;
				
				for($j=0;$j<$longueur;$j++)
				{
				$caractere=substr($ligne,$j,1);
				$writing=$writing.'&#'.ord($caractere).';';
				
				}
				
$writing= preg_replace('^&#60;&#98;&#114;&#62;^','<br>',$writing);
$writing= preg_replace('^&#146;^','\'',$writing);
				
return $writing;
}




if (is_file($deck)) {

	if ($TabFich = file($deck)) {

	$i=0;
	
	
	
	
		while($i < count($TabFich)) 
			{$pdf->AddPage('L', 'A4');
			$html='';
			for($k=0; $k<10;$k++){
			$html='';

				
				if($i<count($TabFich)) {
				$html.='<span style="font-size:18px;">';
				$html.= accents($TabFich[$i]);
				$html.="</span>";
				}
				$i++;
				
				if($i<count($TabFich)) {
				$html.='<div style="text-align:center;"><b>';
				$html.= accents($TabFich[$i]);
				$html.="</b></div>";
				}
				$i++;
				

				if($i<count($TabFich)) {
				$html.='<div style="text-align:justify;"><b>';
				$html.= accents($TabFich[$i]);
				$html.="</b>";
				}
				$i++;
				
				if($i<count($TabFich)) {
				$html.= accents($TabFich[$i]);
				$html.="</div>";
				}
				$i++;
				
				if($i<count($TabFich)) {
				$html.='<div style="text-align:justify;"><i>';
				$html.= accents($TabFich[$i]);
				$html.="</i>";
				}
				$i++;
				$i++;

			
			if($k==4 || $k==9) {$pdf->writeHTMLCell ('54','79','', '', $html, '1', '1','0','true');} else {$pdf->writeHTMLCell ('54','79','', '', $html, '1', '0','0','true');} 
			
			}
			
			}
	}


	
	
	
	
	
	else {
	$html="Le fichier ne peut être lu...";

	}
}

else {
$html= "Désolé le fichier n'est pas valide";

}


// Print text using writeHTMLCell()
$pdf->writeHTML($html, true, false, true, false, '');

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$deck_out=$deck.'.pdf';
$pdf->Output($deck_out, 'I');

//============================================================+
// END OF FILE
//============================================================+