<style>
table tr td{
	border-bottom:1px #CCC solid;
}
table tr:hover{
	background-color:#B7FFFF;
}
.boxheader{
	padding-left:40px;
	}
.boxheader .cmbstatus{
	border:1px #CCC solid;
	height:30px;
	}
	
.box1{
	float:left;
		margin-bottom:20px;
		width:20%;
	}
	.box2{
		float:right;
		width:70%;
		text-align:right;
		margin-bottom:20px;
}
button,.submit{
	background:#0080C0;
	color:#FFF;
	border:0px;
	border-radius:4px;
	height:30px;
	cursor:pointer;
}
button:hover{
	background-color:#2DBBFF;
}
.submit:hover{
	background-color:#2DBBFF;
}
</style>
<table width="98%" align="center" cellspacing="4" cellpadding="4">
<tr>
    <td colspan="21" align="center"><h2>DATA MATERI BIMBA AIUEO SUKASARI</h2></td>
  </tr>
  <tr>
    <td height="34" colspan="7"><div align="left"><a href="?page=tambah materi"><button><i class="fa fa-plus"></i>Tambah materi</button></a><br /><br /></a></div></td>
  </tr>
  <tr bgcolor="#E9E9E9">
    <td width="116" height="51">id materi</td>
    <td width="107">tgl input</td>
    <td width="106">materi</td>
    <td width="99">admin</td>
    <td width="82">Level</td>
    <td colspan="2">Pilihan</td>
  </tr>
  <?php
  $str=mysql_query("select * from materi");
  while($dt_materi=mysql_fetch_array($str)){
  ?>
  <tr>
    <td><?php echo $dt_materi[0];  ?></td>
    <td><?php echo $dt_materi[1];  ?></td>
    <td><?php echo $dt_materi[2];  ?></td>
    <td><?php echo $dt_materi[3];  ?></td>
    <td><?php echo $dt_materi[4];  ?></td>
    <td width="56"><a href="?page=edit materi&id=<?php echo sha1($dt_materi[0]); ?>">Edit</a></td>
    <td width="64"><a href="proses_materi.php?page=hapus&id=<?php echo $dt_materi[0]; ?>">Hapus</a></td>
  </tr>
  <?php
  }
  ?>
</table>
