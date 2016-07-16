<?php
function ResizeFoto($new_name,$file,$dir,$width){
$dir=$dir;
$file_up=$dir.$_FILES[''.$file.'']['name'];

move_uploaded_file($_FILES[''.$file.'']['tmp_name'],$dir.$_FILES[''.$file.'']['name']);

$img=imagecreatefromjpeg($file_up);
$lebar_asli=imageSX($img);
$tinggi_asli=imageSY($img);

$lebar_baru=$width;
$tinggi_baru=($lebar_baru/$lebar_asli)*$tinggi_asli;

$img2=imagecreatetruecolor($lebar_baru,$tinggi_baru);
imagecopyresampled($img2,$img,0,0,0,0,$lebar_baru,$tinggi_baru,$lebar_asli,$tinggi_asli);

imagejpeg($img2,$dir.$new_name,100);

imagedestroy($img);
imagedestroy($img2);
$remove_small=unlink($file_up);
return true;	
}
?>