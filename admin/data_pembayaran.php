<script src="../asset/js/jquery-1.8.2.min.js"></script>
<script src="../asset/jquery_ui/jquery-ui.js"></script>

<link rel="stylesheet" href="../asset/jquery_ui/jquery-ui.css"> 

  <script type="text/javascript">
  $(function() {
	$("#tgl1").datepicker({
		dateFormat:'yy-mm-dd',
		});
	$("#tgl2").datepicker({
		dateFormat:'yy-mm-dd',
		});
	
  });
  </script>
<style>
.red{
	color:#F00;
}
.green{
	color:#09F;
}
table tr td{
	border-bottom:1px #CCC solid;
	padding-left:8px;
	padding-right:8px;
}
table tr:hover{
	background-color:#B7FFFF;
}
.boxheader{
	padding-left:40px;
	}
.boxheader .text{
	border:1px #CCC solid;
	height:30px;
	padding-left:8px;
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
.boxheader button,.boxheader .submit{
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




<h2 align="center">DATA PEMBAYARAN SISWA</h2>

<div id="boxheader" class="boxheader">

<div class="box1">
 <p><a href="?page=form pembayaran"><button><i class="fa fa-plus"></i> INPUT PEMBAYARAN</button></a><br /><br /></p>
 </div>
 
 <div class="box2" style="border:1px #CCC solid; padding-bottom:8px; padding-top:8px">
 <?php
$kurangtanggal = date("Y-m-d", mktime(0,0,0,date("m"),date("d")-7,date("Y")));
?>
 <form action="laporan/laporan_pembayaran.php" method="post" target="new">

<span>TGL AWAL</span>
<input name="tgl1" type="text" id="tgl1" class="text" value="<?php echo $kurangtanggal ;?>" onchange="return sorting()" readonly="readonly"/>
 
 <span> &nbsp;  TGL AKHIR</span>
<input name="tgl2" type="text" id="tgl2" class="text" value="<?php echo date('Y-m-d');?>" readonly="readonly" onchange="return sorting()" />
<select name="status" class="text"  id="status" onchange="sorting()">
 <option value="semua">Semua Status</option>
 <option value="LUNAS">LUNAS</option>
 <option value="BELUM_LUNAS">BELUM LUNAS</option>
 </select>
 
 <button class="submit" type="submit"><i class="fa fa-print"></i> Cetak</button>
 </form>
 
 </div>

</div>

<br style="clear:both" />

<div id="boxtabel">
<table width="1151" cellpadding="2" align="center" cellspacing="3" border="0">
<tr bgcolor="#CCCCCC">
    <th width="117" height="40">Nis</th>
    <th width="284">Nama</th>
    <th width="169">Tgl Bayar</th>
    <th width="214">level</th>
    <th width="159">Nominal </th>
    <th width="163">Status Pembayar</th>
    </tr>
  <?php
if(isset($_GET['hal'])){
$hal=$_GET['hal'];	
}else{
$hal=1;	
}
$max=25;
$dari=($hal*$max)-$max;

	 $str=mysql_query("select * from pembayaran
  					inner join siswa on pembayaran.nis=siswa.nis
					inner join level on pembayaran.id_level=level.id_level limit $dari,$max");
  
while($dt_pembayaran=mysql_fetch_array($str)){
	$status_bayar=$dt_pembayaran['status_bayar'];
	
	if($status_bayar=='LUNAS'){
	$status='<i class="fa fa-check green"></i> LUNAS';	
	} else{
	$status='<i class="fa fa-times red"></i> BELUM LUNAS';	
	}
?>
  <tr>
    <td><?php echo $dt_pembayaran['nis'];  ?></td>
    <td><?php echo $dt_pembayaran['nm_siswa'];  ?></td>
    <td><?php echo date('d-m-Y',strtotime($dt_pembayaran[1]));  ?></td>
    <td><?php echo $dt_pembayaran['level'];  ?></td>
    <td><div align="right">Rp. <?php echo number_format($dt_pembayaran['bayar']);  ?></div></td>

    <td><?php echo $status; ?></td>
    </tr>
  
<?php
}

?>
<tr>
<td height="50" align="center" colspan="23">
<?php
$str2=mysql_query("select * from siswa");
$jml=mysql_num_rows($str2);
$hasil=ceil($jml/$max);
echo"Halaman Ke $hal/$hasil <br />";
if($hal>1){
$new_hal=$hal-1;
echo"<a href='?page=siswa&hal=$new_hal'>Kembali</a>";	
}

for($a=1;$a<=$hasil;$a++){
	echo"&nbsp&nbsp<a href='?page=siswa&hal=$a'>$a</a>&nbsp&nbsp";
}

if($hal<$hal){
$new_hal=$hal+1;
echo"<a href='?page=siswa&hal=$new_hal'>Selanjutnya</a>";	
}
?>
</td>
</tr>
</table>
</div>

<script>
function sorting(){
//Mengambil value tgl 1 dan 2
	var tgl1 = $('#tgl1').val();
	var tgl2 = $('#tgl2').val();
	var status = $('#status').val();
	//Gunakan jquery AJAX

			$.ajax({
                type: "POST",
                url :'filter/data_pembayaran.php',
                data: "tgl1="+tgl1+"&tgl2="+tgl2+"&status="+status,
                success: function(data){
					 $("#boxtabel").html(data);
                }
            });

}

</script>