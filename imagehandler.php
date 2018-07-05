<?php
if(isset($_FILES['guambar'])){
	$file=$_FILES['guambar']['tmp_name'];
	$destinasi='assets/image/'.$_FILES['guambar']['name'];
	move_uploaded_file($file, $destinasi);
	var_dump($_FILES['guambar']);
}

if(isset($_POST['updatestringgambar'])){
	print_r('sukses bosq');
}
?>