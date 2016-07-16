<?php session_start();
include"../koneksi/koneksi.php";
include"../pdf/fpdf.php";

class PDF extends FPDF{
	
	function Header(){
		$this->Image('logo2.jpg',5,7,195,30);
		$this->Ln(30);
		$this->SetFont('Arial','B',14);
		$this->Cell(195,7,'BUKTI PEMBAYARAN SISWA',0,0,'C');
		$this->Ln(25);
	}
	function Isi(){
	 $level=$_SESSION['level_siswa'];
	 
    $str=mysql_query("select  *,DATE_ADD(date(tgl_bayar),INTERVAL 6 MONTH) as jatuh from pembayaran
  					where nis='$_GET[nis]'
					");
		
	$this->SetFont('Times','',12);
	
	$this->Cell(30,7,'NIS',0,0,'L');
	$this->Cell(50,5,': '.$_GET['nis'],0,0,'L');
	$this->Ln(7);
	$this->Cell(30,7,'NAMA',0,0,'L');
	$this->Cell(50,5,': '.$_SESSION['nama-siswa'],0,0,'L');	
	$this->Ln(15);
	$this->SetFont('Times','B',9);
	$this->SetX(10);
	$this->Cell(20,7,'LEVEL',1,0,'C');
	$this->Cell(30,7,'Tagihan',1,0,'C');
	$this->Cell(30,7,'Nominal pembayaran',1,0,'C');
	$this->Cell(30,7,'Status pembayaran',1,0,'C');
	$this->Cell(30,7,'Tanggal bayar',1,0,'C');
	$this->Cell(30,7,'Jatuh tempo',1,0,'C');
	$this->Ln(7);
	while($dt_pembayaran=mysql_fetch_array($str)){
		$nom=600000;
	$this->SetFont('Times','',9);
	$this->SetX(10);
	$this->Cell(20,7,$dt_pembayaran['id_level'],1,0,'C');
	$this->Cell(30,7,'Rp.'.number_format($nom),1,0,'C');
	$this->Cell(30,7,'Rp.'.number_format($dt_pembayaran["bayar"]),1,0,'C');
	if($dt_pembayaran["bayar"]<600000){
		$status="Pembayaran Kurang";
	}else if($dt_pembayaran["bayar"]==600000){
		$status="LUNAS";	
	}
	$this->Cell(30,7,($status),1,0,'C');
	$this->Cell(30,7,$dt_pembayaran[1],1,0,'C');
	$this->Cell(30,7,$dt_pembayaran['jatuh'],1,0,'C');
	$this->Ln(7);	
	}
	}
	
}

$pdf=new PDF();


$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->Isi();
$pdf->Output();

?>