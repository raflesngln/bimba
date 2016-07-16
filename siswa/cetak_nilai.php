<?php session_start();
include"../koneksi/koneksi.php";
include"../pdf/fpdf.php";

class PDF extends FPDF{
	
	function Header(){
		$this->Image('logo2.jpg',5,7,195,30);
		$this->Ln(30);
		$this->SetFont('Arial','B',14);
		$this->Cell(195,7,'Nilai Siswa',0,0,'C');
		$this->Ln(25);
	}
	function Isi(){
	 $level=$_SESSION['level_siswa'];
	 
    $str=mysql_query("select * from nilai where nis='$_GET[nis]' order by id_level asc");
		
	$this->SetFont('Times','',12);
	
	$this->Cell(30,7,'NIS',0,0,'L');
	$this->Cell(50,5,': '.$_GET['nis'],0,0,'L');
	$this->Ln(7);
	$this->Cell(30,7,'NAMA',0,0,'L');
	$this->Cell(50,5,':'.$_SESSION['nama-siswa'],0,0,'L');	
	$this->Ln(15);
	$this->SetFont('Times','B',9);
	$this->SetX(5);
	$this->Cell(20,7,'LEVEL',1,0,'C');
	$this->Cell(15,7,'BACA',1,0,'C');
	$this->Cell(15,7,'TULIS',1,0,'C');
	$this->Cell(15,7,'HITUNG',1,0,'C');
	$this->Cell(15,7,'HASIL',1,0,'C');
	$this->Cell(15,7,'GRADE',1,0,'C');
	$this->Cell(95,7,'CATATAN',1,0,'C');
	$this->Ln(7);
	while($dt_jadwal=mysql_fetch_array($str)){
	$this->SetFont('Times','',9);
	$this->SetX(5);
	$this->Cell(20,7,$dt_jadwal['id_level'],1,0,'C');
	$this->Cell(15,7,$dt_jadwal['nilai_baca'],1,0,'C');
	$this->Cell(15,7,$dt_jadwal['nilai_tulis'],1,0,'C');
	$this->Cell(15,7,$dt_jadwal['nilai_hitung'],1,0,'C');
	$this->Cell(15,7,$dt_jadwal['hasil'],1,0,'C');
	$this->Cell(15,7,$dt_jadwal['grade'],1,0,'C');
	$this->Cell(95,7,$dt_jadwal['catatan'],1,0,'L');
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