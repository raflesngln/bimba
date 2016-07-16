<?php
if(isset($_GET['page']))
{
	$menu=$_GET['page'];
	
	switch($menu)
	{
	case'beranda':include"beranda.php";
	break;	
	case'admin':include"data_admin.php";
	break;	
	case'tambah admin':include"frm_admin.php";
	break;
	case'edit admin':include"frm_edit_admin.php";
	break;	
	case'guru':include"data_guru.php";
	break;
	case'tambah guru':include"form_guru.php";
	break;
	case'edit guru':include"edit_guru.php";
	break;
	case'siswa':include"data_siswa.php";
	break;
	case'tambah siswa':include"form_siswa.php";
	break;
	case'edit siswa':include"edit_siswa.php";
	break;
	case'level':include"data_level.php";
	break;
	case'tambah level':include"form_level.php";
	break;
	case'edit level':include"form_edit_level.php";
	break;
	
	case'berita':include"data_berita.php";
	break;
	case'tambah berita':include"frm-berita.php";
	break;
	case'materi':include"materi.php";
	break;
	case'tambah materi':include"frm_materi.php";
	break;
	case'edit materi':include"edit_materi.php";
	break;
	case'pembayaran':include"data_pembayaran.php";
	break;
	case'form pembayaran':include"form_pembayaran.php";
	break;
	case'jadwal':include"data_jadwal.php";
	break;
	case'tambah jadwal':include"jadwal.php";
	break;
	case'edit jadwal':include"edit_jadwal.php";
	break;
	case'nilai':include"nilai.php";
	break;
	case'edit berita':include"edit_berita.php";
	break;
	}
}
else
{	

header("location:index.php?page=beranda");
	
}
?>