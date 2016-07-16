
<?php
$query=mysql_query("select * from guru where nip='$_GET[nip]'");
$dt_guru=mysql_fetch_array($query);
?>

<form method="post" action="proses_guru.php?page=edit&nip=<?php echo $dt_guru[0]; ?>" enctype="multipart/form-data">
<body bgcolor="#FFFFFF">
<table width="500" align="center" cellpadding="4" cellspacing="4" border="0">
  <tr>
    <td>Nama</td>
    <td><input type="text" name="nama_guru" value="<?php echo $dt_guru['nm_guru']; ?>" required /></td>
  </tr>
  <tr>
    <td>Alamat</td>
    <td><textarea name="alamat_guru" cols="50" rows="5" required><?php echo $dt_guru['alamat_guru']; ?></textarea></td>
  </tr>
  <tr>
    <td>Tempat Lahir</td>
    <td><input type="text" name="tmptlahir_guru" value="<?php echo $dt_guru['tmptlahir_guru']; ?>" required /></td>
  </tr>
  <tr>
   <td>Tanggal Lahir</td>
    		<td>
    			Tanggal.<select name="tgl" required>
    			<option value=""></option>
    			<?php
				$tgl=substr($dt_guru['tgllahir_guru'],9,2);
				for($a=1;$a<=31;$a++){
				
				?>
				<option value='<?php echo $a; ?>' <?php echo ($tgl==$a)?"selected='selected'":""; ?>><?php echo $a; ?></option>
                <?php	
				}
				?>
    
    			</select>
     Bulan.<select name="bln" required>
    <option value=""></option>
    <?php
	for($a=1;$a<=12;$a++){
		switch($a){
		case 1:$bulan='Januari';
		break;
		case 2:$bulan='Februari';
		break;
		case 3:$bulan='Maret';
		break;
		case 4:$bulan='April';
		break;
		case 5:$bulan='Mei';
		break;
		case 6:$bulan='Juni';
		break;
		case 7:$bulan='Juli';
		break;
		case 8:$bulan='Agustus';
		break;
		case 9:$bulan='September';
		break;	
		case 10:$bulan='Oktober';
		break;
		case 11:$bulan='November';
		break;
		case 12:$bulan='Desember';
		break;	
		}
		
		$bulan1=substr($dt_guru['tgllahir_guru'],6,2);
		 ?>
        
		<option value='<?php echo $a; ?>' <?php echo ($bulan1==$a)?"selected='selected'":""; ?>><?php echo $bulan; ?></option>
        <?php	
	}
	?>
    </select>
    
    Tahun.<select name="thn" required>
    <option value=""></option>
    <?php
	$tahun=substr($dt_guru['tgllahir_guru'],0,4);
	$thn=date('Y')-50;
	$thn2=date('Y')-20;
	for($a=$thn;$a<=$thn2;$a++){
		?>
		<option value='<?php echo $a ?>' <?php echo ($tahun==$a)?"selected='selected'":""; ?>><?php echo $a; ?></option>	
        <?php
	}
	?>
    </select>
    
    
    </td>
  </tr>
  <tr>
    <td>Email</td>
    <td><input type="email" name="email_guru" value="<?php echo $dt_guru['email_guru']; ?>" required /></td>
  </tr>
 
  <tr>
  	<td>No. Telepon</td>
    <td><input type="number" min="0" value="<?php echo $dt_guru['tlp_guru']; ?>" name="tlp_guru" required /></td>
  </tr>
  
    
  <tr>
    <td><input type="submit" value="UPDATE" ></td>
     <td><input type="reset" value="BATAL" onClick="location=('?page=guru')" ></td>
  </tr>
  <tr>
	<td height="263" colspan="7">&nbsp;</td>
 </tr>

</table>
</body>
</form>