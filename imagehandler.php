<?php
if(isset($_FILES['guambar'])){
	$file=$_FILES['guambar']['tmp_name'];
	$destinasi='assets/image/'.$_FILES['guambar']['name'];
	move_uploaded_file($file, $destinasi);
	echo $_FILES['guambar']['name'];
}

if(isset($_POST['updatestringgambar'])){
	include 'db.php';
	$q='UPDATE daftar_buku SET gambar="'.$_POST['namafile'].'" WHERE id="'.$_POST['kodetogel'].'";';
	if($conn->query($q)==True){
		print_r('sukses');
	}
	else{
		print_r('gagal');
	}
}
?>