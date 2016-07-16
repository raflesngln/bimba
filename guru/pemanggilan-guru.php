<?php
if(isset($_GET['page']))
{
	$menu=$_GET['page'];
	
	switch($menu)
	{
	case'beranda-guru':include"beranda.php";
	break;	
	
	
	
	}
}
else
{	

header("location:index.php?page=home");
	
}
?>