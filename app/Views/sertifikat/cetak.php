<?php
class MYPDF extends TCPDF
{
	function Header()
	{
	}
	function Footer()
	{
	}
}

$pdf = new MYPDF('L', 'mm', 'A4', true, 'UTF-8', false);
$pdf->Open();

// $pdf->SetTitle($detail->nama);

$pdf->AddPage('L', 'A4');

//Buat PDF 
$pdf->Output("huasbduyas" . '.pdf', 'I');
