<?php session_start();
include"../koneksi/koneksi.php";
include"../pdf/fpdf.php";

class PDF extends FPDF{
	
	function Header(){
		$this->Image('logo2.jpg',5,7,195,30);
		$this->Ln(30);
		$this->SetFont('Arial','B',14);
		$this->Cell(195,7,'JADWAL SISWA',0,0,'C');
		$this->Ln(25);
	}
	function Isi(){
	 $nis=$_SESSION['nis-siswa'];
	 
     $str=mysql_query("select *,guru.nm_guru as nama,level.level as level,materi.materi as mat from jadwal
  					inner join guru on jadwal.nip=guru.nip
					inner join materi on jadwal.id_materi=materi.id_materi
					inner join level on jadwal.id_level=level.id_level
					where jadwal.nis='$nis' order by hari desc");
		
	$this->SetFont('Times','',12);
	
	$this->Cell(30,7,'NIS',0,0,'L');
	$this->Cell(50,5,': '.$_SESSION['nis-siswa'],0,0,'L');
	$this->Ln(7);
	$this->Cell(30,7,'NAMA',0,0,'L');
	$this->Cell(50,5,': '.$_SESSION['nama-siswa'],0,0,'L');	
	$this->Ln(15);
	$this->SetFont('Times','B',9);
	$this->SetX(25);
	$this->Cell(35,7,'GURU',1,0,'C');
	$this->Cell(35,7,'MATERI',1,0,'C');
	$this->Cell(30,7,'HARI',1,0,'C');
	$this->Cell(28,7,'JAM',1,0,'C');
	$this->Cell(28,7,'LEVEL',1,0,'C');
	$this->Ln(7);
	while($dt_jadwal=mysql_fetch_array($str)){
	$this->SetFont('Times','B',9);
	$this->SetX(25);
	$this->Cell(35,7,$dt_jadwal['nama'],1,0,'C');
	$this->Cell(35,7,$dt_jadwal['materi'],1,0,'C');
	$this->Cell(30,7,$dt_jadwal['hari'],1,0,'C');
	$this->Cell(28,7,$dt_jadwal['jam'],1,0,'C');
	$this->Cell(28,7,$dt_jadwal['level'],1,0,'C');
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