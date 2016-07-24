<script src="../asset/js/jquery-1.8.2.min.js"></script>
<style>
#Simpan{
	padding:10px 25px;
	background-color:#00BFBF;
	border:none;
	color:#FFF;
	border-radius:5px;
	cursor:pointer;
}
select{
	height:30px;
	width:250px;
}
table tr td{
	border-bottom:1px #CCC solid;
}
table input[type=text]{
	height:28px;
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



<h2 align="center">Data Jadwal Mengajar </h2>

<form method="post" action="simpan_nilai.php" name="mysubmit" id="mysubmit">

<div id="boxheader" class="boxheader">

<div class="box1">
<table width="341">
  <tr>
    <td width="88">Pilih level</td>
    <td width="20">:</td>
    <td width="217"><select name="level" required="required" id="level" onchange="return sorting()" >
      <option value="">Pilih Level</option>
      <?php
		 include"../koneksi/koneksi.php";
$query=mysql_query("select * from level
");
	while($data=mysql_fetch_array($query)){
		?>
      <option value="<?php echo $data['id_level'];?>"><?php echo $data['level'];?></option>
      <?php } ?>
    </select></td>
  </tr>
  <tr>
    <td>Siswa</td>
    <td>:</td>
    <td><select name="siswa" required id="siswa" onchange="return sorting()">
      <option value="">Pilih Siswa</option>
      <?php
	$nip=$_SESSION['nip-guru'];

$query2=mysql_query("select * from siswa a
	INNER JOIN jadwal b on a.nis=b.nis
	where b.nip='$nip' AND a.status='aktif' GROUP BY a.nis
");
	while($data2=mysql_fetch_array($query2)){
		?>
      <option value="<?php echo $data2['nis'];?>"><?php echo $data2['nm_siswa'];?></option>
      <?php } ?>
      </select></td>
  </tr>
  </table>
</div>
 


</div>
<input type="hidden" name="guru" id="guru" value="<?php echo $nip;?>" />
<br style="clear:both" />

<div id="boxtabel">
<table width="99%">
  <tr>
    <td colspan="4">&nbsp;</td>
    </tr>
  <tr bgcolor="#E9E9E9">
    <td width="5%" height="34">No</td>
    <td width="30%">Materi
      <label for="guru"></label></td>
    <td width="20%">Nilai</td>
    <td width="45%">Catatan</td>
  </tr>

  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
  </table>
  
</div>

  <p align="center"><input name="Simpan" type="submit" id="Simpan" value="simpan" /></p>

</form>

<script>
function sorting(){
//Mengambil value tgl 1 dan 2
	var siswa = $('#siswa').val();
	var guru = $('#guru').val();
	var level = $('#level').val();
	//Gunakan jquery AJAX
		$.ajax({
                type: "POST",
                url :'sort_nilai.php',
                data: "siswa="+siswa+"&guru="+guru+"&level="+level,
                success: function(data){
					 $("#boxtabel").html(data);
                }
            });
}

//tidak dipakai
function get_level(){
//Mengambil value tgl 1 dan 2
	var siswa = $('#siswa').val();
	var guru = $('#guru').val();
	
	//Gunakan jquery AJAX
		$.ajax({
                type: "POST",
				dataType:"json",
                url :'get_level.php',
                data: "siswa="+siswa+"&guru="+guru,
                success: function(data){
			       $("#level").empty();
				    $("#level").append('<option value="">Pilih level</option>');
                     for (var i =0; i<data.length; i++){
                   var option = "<option value='"+data[i].materi+"'>"+data[i].materi+"</option>";
                          $("#level").append(option);
						  //load_state();
                       }
                }
            });
}



</script>