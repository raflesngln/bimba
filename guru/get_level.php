
          <?php
		  include"../koneksi/koneksi.php";
		  $nis=$_POST['siswa'];
		   $nip=$_POST['guru'];
		 $no=1;
		 $rows=array();
$query=mysql_query("select * from level a
	INNER JOIN materi b on a.id_level=b.id_level
	INNER JOIN siswa c on b.nis=c.nis
	LEFT JOIN nilai d on a.id_materi=d.id_materi
	where b.nis='$nis'
");
	while($data=mysql_fetch_array($query)){
		$r=array(
		"materi"=>$data['materi'],
		);
    $rows[] = $r;
}
echo json_encode($rows);
	?>



