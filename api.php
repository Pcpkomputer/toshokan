<?php
session_start();


  if(isset($_POST['ngeceksesi'])){
    print_r($_SESSION['mode']);
    if(isset($_SESSION['mode'])){
      print_r('adasesi');
    }
    if(!isset($_SESSION['mode'])){
      print_r('tidakadasesi');
    }
    
  }

  if(isset($_POST['loginform'])){
    include 'db.php';
    $q='SELECT * FROM pengurus_toshokan WHERE email="'.$_POST['email'].'";';
    $koneksi=$conn->query($q);
    if(mysqli_num_rows($koneksi)==0){
      print_r('tidakditemukan');
    }
    else{
      $hasil=$koneksi->fetch_assoc();
      if($hasil['password']==$_POST['password']){
        session_start();
        $_SESSION['username']=$hasil['username'];
        $_SESSION['nama']=$hasil['nama'];
        $_SESSION['mode']='admin';
        echo 'sukses';
      }
      else{
        echo 'passwordsalah';
      }
    }
  }


  if(isset($_POST['querypencarianindex'])){
  include 'db.php';
  $q='SELECT * FROM daftar_buku WHERE judul LIKE "%'.$_POST['query'].'%";';
  $kon=$conn->query($q);
  while($hasil=$kon->fetch_assoc()){
    if($hasil['stok']>0){
      $a='green';
      $k='Stok masih tersedia';
    }
    if($hasil['stok']==0){
      $a='red';
      $k='Stok habis / Sedang dipinjam';
    }
    echo ' <tr>
          <td>
         <img src="assets/image/'.$hasil['gambar'].'" style="width: 120px; height: 150px">
          <td>
            <td>
        <p style="color:#1c2e36;margin-left: 0px; font-size: 20px;margin-top: -19px"><b>'.$hasil['judul'].'</b></p>
        <p style="color:#1c2e36;margin-left: 0px; font-size: 13px;margin-top: -18px">'.$hasil['penulis'].' / '.$hasil['penerbit'].' / '.$hasil['tahunterbit'].' / '.$hasil['lokasi'].'</p>
         <p style="color:#1c2e36;margin-left: 0px; font-size: 12px;word-wrap: break-word;max-height: 48px; overflow: hidden;">'.$hasil['penjelasan'].'</p>
         <label style="font-size: 12px">Kategori : '.$hasil['kategori'].'</label><label style="float: right;font-size: 12px;margin-top: 8px;color: '.$a.'">'.$k.'</label>
            </td>
        </tr>

        <tr>
          <td colspan="3"><hr></td>
        </tr>';
  }

}

if(!isset($_SESSION['mode'])){

}
else{

if(isset($_POST['logoutadmin'])){
  session_unset();
}

if(isset($_POST['ifetch'])){
	$fetchid=$_POST['ifetch'];
	$fetchid=((int)$fetchid-1)*2;
	include 'db.php';
	$sql='SELECT * from daftar_buku ORDER BY id DESC LIMIT 2 OFFSET '.$fetchid.';';
	$hasil=$conn->query($sql);
	while($konten=$hasil->fetch_assoc()){
      		echo '      	<hr>
      	<img src="assets/image/'.$konten['gambar'].'" style="width: 230px; height: 310px;opacity: 0.5" class="rounded float-left" alt="...">
   		<div style="left: 20px; height: 310px; max-height: 310px;" class="card">
		  <h5 class="card-header">'.$konten['judul'].'</h5>
		  <div class="card-body">
		    <h5 class="card-title">'.$konten['penulis'].' / '.$konten['penerbit'].' / '.$konten['tahunterbit'].'</h5>
		    <p class="card-text" style="max-height:146;overflow:hidden;">'.$konten['penjelasan'].'</p>
		    <a href="#" id="selengkapnya_1" jurukunci="'.$konten['id'].'" class="btn btn-dark">Selengkapnya</a>
		  </div>
		</div>
		<br>';
      	}
}

if(isset($_POST['search'])){
	$q=$_POST['search'];
	include 'db.php';
	$sql="SELECT * FROM daftar_buku WHERE judul LIKE '%".$q."%'";
	$hasil=$conn->query($sql);
	if(mysqli_num_rows($hasil)>0){
	while($konten=$hasil->fetch_assoc()){
      		echo '      	<hr>
      	<img src="assets/image/'.$konten['gambar'].'" style="width: 230px; height: 310px;opacity: 0.5" class="rounded float-left" alt="...">
   		<div style="left: 20px; height: 310px; max-height: 310px;" class="card">
		  <h5 class="card-header">'.$konten['judul'].'</h5>
		  <div class="card-body">
		    <h5 class="card-title">'.$konten['penulis'].' / '.$konten['penerbit'].' / '.$konten['tahunterbit'].'</h5>
		    <p class="card-text">'.$konten['penjelasan'].'</p>
		    <a href="#" id="selengkapnya_1" jurukunci="'.$konten['id'].'" class="btn btn-dark">Selengkapnya</a>
		  </div>
		</div>
		<br>';
      	}
      }
     else{
     	echo '<hr>';
     	echo '<br>';
     	echo '<h3>Tidak ditemukan hasil...</h3>';
     }
}

if(isset($_POST['kelolaanggota'])){
	echo '<button id="tambahanggotatoshokanz" type="button" class="btn btn-success" style="float:left;margin-bottom:18px;">Tambah Anggota Toshokan</button>';
	echo '<div id="hiddentambahanggotatoshokan" style="margin-bottom:20px;display:none;"><form id="formtambahanggota"><input name="nama" placeholder="Nama Anggota"  style="margin-bottom:5px;" type="text" class="form-control" id="recipient-name">
	<input name="email" placeholder="Alamat Email Anggota" style="margin-bottom:5px;" type="text" class="form-control" id="recipient-name">
	<input name="notelp" placeholder="Nomor Telepon Anggota" style="margin-bottom:5px;" type="text" class="form-control" id="recipient-name">
	<input name="namapanggilan" placeholder="Nama Panggilan Anggota" style="margin-bottom:5px;" type="text" class="form-control" id="recipient-name">
	<input name="password" placeholder="Kata Sandi Anggota" type="password" style="margin-bottom:5px;" class="form-control" id="recipient-name">
	<button id="tambahanggotatoshokan" type="button" class="btn btn-success" style="width:1022px;float:left;margin-bottom:10px;margin-top:3px">Simpan</button></form>';
	echo '</div>';
	echo '<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama</th>
      <th scope="col">Email</th>
      <th scope="col">Nomor Telepon</th>
      <th scope="col">Nickname</th>
      <th scope="col">Password</th>
      <th scope="col">@Panel</th>
    </tr>
  </thead>
  <tbody>';
	include 'db.php';
	$sql="SELECT * FROM anggota_toshokan;";
	$hasil=$conn->query($sql);
	while($konten=$hasil->fetch_assoc()){
		echo '<tr>
      <th scope="row">'.$konten['id'].'</th>
      <td>'.$konten['nama'].'</td>
      <td>'.$konten['email'].'</td>
      <td>'.$konten['nomortelepon'].'</td>
      <td>'.$konten['nickname'].'</td>
      <td>'.$konten['password'].'</td>
      <td><button id="ngeditanggotatoshokan" jurukunci="'.$konten['id'].'" type="button" class="btn btn-light">Edit</button><button id="deleteanggotatoshokan" jurukunci="'.$konten['id'].'" type="button" class="btn btn-danger">Hapus</button></td>
    </tr>';
	}
	echo '</tbody>
</table>';
}

if(isset($_POST['pengurustoshokan'])){
	echo '<button id="tambahpengurustoshokanz" type="button" class="btn btn-success" style="float:left;margin-bottom:18px;">Tambah Pengurus Toshokan</button>';
	echo '<div id="hiddentambahpengurustoshokan" style="margin-bottom:20px;display:none;"><form id="formtambahpengurus"><input name="nama1" placeholder="Nama Pengurus"  style="margin-bottom:5px;" type="text" class="form-control" id="recipient-name">
	<input name="email1" placeholder="Alamat Email Pengurus" style="margin-bottom:5px;" type="text" class="form-control" id="recipient-name">
	<input name="nickname1" placeholder="Username Pengurus" style="margin-bottom:5px;" type="text" class="form-control" id="recipient-name">
	<input name="password1" placeholder="Kata Sandi Pengurus" type="password" style="margin-bottom:5px;" class="form-control" id="recipient-name">
	<button id="tambahpengurustoshokan" type="button" class="btn btn-success" style="width:1022px;float:left;margin-bottom:10px;margin-top:3px">Simpan</button></form>';
	echo '</div>';
	echo '<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama</th>
      <th scope="col">Email</th>
      <th scope="col">Username</th>
      <th scope="col">Password</th>
      <th scope="col">@Panel</th>
    </tr>
  </thead>
  <tbody>';
	include 'db.php';
	$sql="SELECT * FROM pengurus_toshokan;";
	$hasil=$conn->query($sql);
	while($konten=$hasil->fetch_assoc()){
		echo '<tr>
      <th scope="row">'.$konten['id'].'</th>
      <td>'.$konten['nama'].'</td>
      <td>'.$konten['email'].'</td>
      <td>'.$konten['username'].'</td>
      <td>'.$konten['password'].'</td>
      <td><button id="ngeditpengurustoshokan" jurukunci="'.$konten['id'].'" type="button" class="btn btn-light">Edit</button><button id="deletepengurustoshokan" jurukunci="'.$konten['id'].'" type="button" class="btn btn-danger">Hapus</button></td>
    </tr>';
	}
	echo '</tbody>
</table>';
}

if(isset($_POST['ngeditanggotatoshokan'])){
	$jurukunci=(int)$_POST['jurukunci'];
	include 'db.php';
	$sql="SELECT * FROM anggota_toshokan WHERE id=".$jurukunci.";";
	$hasil=$conn->query($sql);
	while($konten=$hasil->fetch_assoc()){
		echo '<div class="modal fade show" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: inline; padding-right: 0px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sunting Anggota Toshokan</h5>
        <button type="button" id="xtutupmodaltambahanggota" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formeditanggota">
          <div class="form-group" style="display: none;">
            <label for="recipient-name" class="col-form-label" style="display: none;">#:</label>
            <input name="id" value="'.$konten['id'].'" type="text" class="form-control" id="recipient-name" style="display: none;">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nama:</label>
            <input name="nama" value="'.$konten['nama'].'" type="text" class="form-control" id="recipient-name">
          </div>
           <div class="form-group">
            <label for="recipient-name" class="col-form-label">Email:</label>
           <input name="email" value="'.$konten['email'].'" type="text" class="form-control" id="recipient-name">
          </div>
           <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nomer Telepon:</label>
          <input name="nomertelepon" value="'.$konten['nomortelepon'].'" type="text" class="form-control" id="recipient-name">
          </div>
           <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nickname:</label>
           <input name="nickname" value="'.$konten['nickname'].'" type="text" class="form-control" id="recipient-name">
          </div>
           <div class="form-group">
            <label for="recipient-name" class="col-form-label">Password:</label>
           <input name="password" value="'.$konten['password'].'" type="password" class="form-control" id="recipient-name">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button id="btntutupmodaltambahanggota" type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button id="btnprosesmodaltambahanggota" type="button" class="btn btn-primary">Ubah</button>
      </div>
    </div>
  </div>
</div>';
	 }
}

if(isset($_POST['ngeditpengurustoshokan'])){
	$jurukunci=(int)$_POST['jurukunci'];
	include 'db.php';
	$sql="SELECT * FROM pengurus_toshokan WHERE id=".$jurukunci.";";
	$hasil=$conn->query($sql);
	while($konten=$hasil->fetch_assoc()){
		echo '<div class="modal fade show" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: inline; padding-right: 0px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sunting Pengurus Toshokan</h5>
        <button type="button" id="xtutupmodaltambahanggota" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formeditpengurus">
          <div class="form-group" style="display: none;">
            <label for="recipient-name" class="col-form-label" style="display: none;">#:</label>
            <input name="id" value="'.$konten['id'].'" type="text" class="form-control" id="recipient-name" style="display: none;">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nama:</label>
            <input name="nama" value="'.$konten['nama'].'" type="text" class="form-control" id="recipient-name">
          </div>
           <div class="form-group">
            <label for="recipient-name" class="col-form-label">Email:</label>
           <input name="email" value="'.$konten['email'].'" type="text" class="form-control" id="recipient-name">
          </div>
           <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nickname:</label>
           <input name="nickname" value="'.$konten['username'].'" type="text" class="form-control" id="recipient-name">
          </div>
           <div class="form-group">
            <label for="recipient-name" class="col-form-label">Password:</label>
           <input name="password" value="'.$konten['password'].'" type="password" class="form-control" id="recipient-name">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button id="btntutupmodaltambahpengurus" type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button id="btnprosesmodaltambahpengurus" type="button" class="btn btn-primary">Ubah</button>
      </div>
    </div>
  </div>
</div>';
	 }
}

if(isset($_POST['tambahanggotatoshokan'])){
	$nama=$_POST['nama'];
	$email=$_POST['email'];
	$notelp=$_POST['notelp'];
	$namapanggilan=$_POST['namapanggilan'];
	$password=$_POST['password'];
	include 'db.php';
	$key='INSERT INTO anggota_toshokan (id, nama, email, nomortelepon, password, nickname) VALUES (NULL,"'.$nama.'","'.$email.'","'.$notelp.'","'.$_POST['password'].'","'.$namapanggilan.'");';
	if($conn->query($key)==True){
		print_r('success');
	}
	else{
		print_r('error');
	}
}

if(isset($_POST['autheditanggota'])){
	include 'db.php';
	$ewe='UPDATE anggota_toshokan SET nama="'.$_POST['nama'].'",email="'.$_POST['email'].'",nomortelepon="'.$_POST['nomertelepon'].'",password="'.$_POST['password'].'",nickname="'.$_POST['nickname'].'" WHERE id="'.$_POST['id'].'";';
	if($conn->query($ewe)==True){
		print_r('sukses');
	}
	else{
		print_r('error');
	}
}

if(isset($_POST['deleteanggotatoshokan'])){
	include 'db.php';
	$tes='DELETE FROM anggota_toshokan WHERE id="'.$_POST['jurukunci'].'";';
	if($conn->query($tes)==True){
		print_r('sukses');
	}
	else{
		print_r('error');
	}
}

if(isset($_POST['tambahpengurustoshokan'])){
	include 'db.php';
	$key='INSERT INTO pengurus_toshokan (id, nama, email, username, password) VALUES (NULL,"'.$_POST['nama1'].'","'.$_POST['email1'].'","'.$_POST['nickname1'].'","'.$_POST['password1'].'");';
	var_dump($key);
	if($conn->query($key)==True){
		print_r('sukses');
	}
	else{
		print_r('error');
	}
}

if(isset($_POST['updatepengurustoshokan'])){
	include 'db.php';
	$sql='UPDATE pengurus_toshokan SET nama="'.$_POST['nama'].'",email="'.$_POST['email'].'",username="'.$_POST['nickname'].'",password="'.$_POST['password'].'" WHERE id="'.$_POST['id'].'";';
	if($conn->query($sql)==True){
		print_r('sukses');
	}
	else{
		print_r('error bos');
	}
}

if(isset($_POST['deletepengurustoshokan'])){
	include 'db.php';
	$sql='DELETE FROM pengurus_toshokan WHERE id="'.$_POST['jurukunci'].'";';
	if($conn->query($sql)){
		print_r('sukses');
	}
	else{
		print_r('gagal');
	}

}

if(isset($_POST['selengkapnya_1'])){
	include 'db.php';
	$sql='SELECT * FROM daftar_buku WHERE id="'.$_POST['jurukunci'].'";';
	if($conn->query($sql)==True){
		$a=$conn->query($sql);
		while($hasil=$a->fetch_assoc()){
			echo '<kodetogel kodetogel="'.$hasil['id'].'" style=""><img id="guambarcuk" src="assets/image/'.$hasil['gambar'].'" class="rounded float-left" alt="..." style="margin-top: 5px;height: 496px; width: 367px;margin-left:-10px;">
        <div id="keteranganbuku">
        <form id="formketeranganbuku" style="margin-right:-20px;width: 700px;float: right;max-height: 500px; overflow-y: scroll;" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleFormControlInput1">Judul Buku</label>
    <input name="judul" value="'.$hasil['judul'].'" id="inputketeranganbuku" type="text" class="form-control" id="exampleFormControlInput1" disabled>
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Keterangan Buku</label>
    <textarea name="keterangan" id="inputketeranganbuku" class="form-control" id="exampleFormControlTextarea1" rows="3" disabled>'.$hasil['penjelasan'].'</textarea>
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Lokasi</label>
    <input name="lokasi" value="'.$hasil['lokasi'].'" id="inputketeranganbuku" type="text" class="form-control" id="exampleFormControlInput1" disabled>
  </div>

   <div class="form-group">
    <label for="exampleFormControlInput1">Penulis</label>
    <input name="penulis" value="'.$hasil['penulis'].'" id="inputketeranganbuku" type="text" class="form-control" id="exampleFormControlInput1" disabled>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Penerbit</label>
    <input name="penerbit" value="'.$hasil['penerbit'].'" id="inputketeranganbuku" type="text" class="form-control" id="exampleFormControlInput1" disabled>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Tahun Terbit</label>
    <input name="tahunterbit" value="'.$hasil['tahunterbit'].'" id="inputketeranganbuku" type="text" class="form-control" id="exampleFormControlInput1" disabled>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Stok</label>
    <input name="stok" value="'.$hasil['stok'].'" id="inputketeranganbuku" type="text" class="form-control" id="exampleFormControlInput1" disabled>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Kategori</label>
    <input name="kategori" value="'.$hasil['kategori'].'" id="inputketeranganbuku" type="text" class="form-control" id="exampleFormControlInput1" disabled>
  </div>
  <button id="ubahketeranganbuku" type="button" class="btn btn-success">Ubah</button>
  <button id="hapusketeranganbuku" type="button" class="btn btn-danger">Hapus</button>
<button id="kembaliketeranganbuku" type="button" class="btn btn-primary">Kembali</button>

</form>
<form id="formgambar" enctype="multipart/form-data" style="display:none;">
<input name="guambar" id="guambar" type="file" style="display:none;"></input>
</form>
';

		}
	}
	else{
		print_r('gagal');
	}
}

if(isset($_POST['updateketeranganbuku'])){
	include 'db.php';
	$koneksi='UPDATE daftar_buku SET judul="'.$_POST['judul'].'",penjelasan="'.$_POST['keterangan'].'",lokasi="'.$_POST['lokasi'].'",penulis="'.$_POST['penulis'].'",penerbit="'.$_POST['penerbit'].'",tahunterbit="'.$_POST['tahunterbit'].'",stok="'.$_POST['stok'].'",kategori="'.$_POST['kategori'].'" WHERE id="'.$_POST['nomortogel'].'";';
	if($conn->query($koneksi)==True){
		print_r('sukses');
	}
	else{
		print_r('error');
	}
}

if(isset($_POST['deleteketeranganbuku'])){
	include 'db.php';
	$koneksi='DELETE FROM daftar_buku WHERE id="'.$_POST['kodetogel'].'";';
	if($conn->query($koneksi)==True){
		print_r('sukses');
	}
	else{
		print_r('error');
	} 
}

if(isset($_POST['loadmodekelolabuku2'])){
	include 'db.php';
	$query='SELECT * FROM daftar_buku;';
	$koneksi=$conn->query($query);
	echo ' <hr id="kududihiddenmode2">
  <button id="btnkuduhidden2" class="btn btn-success" style="float: right;margin-right: 105px;margin-top: 3.5px">+</button>
        <h1 id="kududihiddenmode2">Kelola Buku - Simplified</h1>
        <hr>
        <select id="kududihiddenmode2" class="form-control modekelolabukumode2" style="width: 100px;float: right;margin-top:-67px;">
  <option>Mode 1</option>
  <option>Mode 2</option>
</select>

<table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Judul</th>
      <th scope="col">Penjelasan</th>
      <th scope="col">Gambar</th>
      <th scope="col">Lokasi</th>
      <th scope="col">Penulis</th>
      <th scope="col">Penerbit</th>
      <th scope="col">Tahun Terbit</th>
       <th scope="col">@Panel</th>
    </tr>
  </thead>
  <tbody>';
	while($hasil=$koneksi->fetch_assoc()){
	echo '  <tr>
      <th scope="row">'.$hasil['id'].'</th>
      <td>'.$hasil['judul'].'</td>
      <td>'.substr($hasil['penjelasan'],0,200).'</td>
      <td>'.$hasil['gambar'].'</td>
      <td>'.$hasil['lokasi'].'</td>
      <td>'.$hasil['penulis'].'</td>
      <td>'.$hasil['penerbit'].'</td>
      <td>'.$hasil['tahunterbit'].'</td>
      <td><a id="panelselengkapnyamodesimplified" href="#" class="btn btn-dark" kodetogel="'.$hasil['id'].'">Panel</a></td>
      </tr>';
	}
	echo '</tbody></table>';

}

if(isset($_POST['querymodesimplified'])){
	include 'db.php';
	$query='SELECT * FROM daftar_buku WHERE judul LIKE "%'.$_POST['query'].'%";';
	$koneksi=$conn->query($query);
	if(mysqli_num_rows($koneksi)>0){
	echo ' <hr id="kududihiddenmode2">
        <h1 id="kududihiddenmode2">Kelola Buku - Simplified</h1>
        <hr>
        <select id="kududihiddenmode2" class="form-control modekelolabukumode2" style="width: 100px;float: right;margin-top:-67px;">
  <option>Mode 1</option>
  <option>Mode 2</option>
</select>

<table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Judul</th>
      <th scope="col">Penjelasan</th>
      <th scope="col">Gambar</th>
      <th scope="col">Lokasi</th>
      <th scope="col">Penulis</th>
      <th scope="col">Penerbit</th>
      <th scope="col">Tahun Terbit</th>
       <th scope="col">@Panel</th>
    </tr>
  </thead>
  <tbody>';
	while($hasil=$koneksi->fetch_assoc()){
	echo '  <tr>
      <th scope="row">'.$hasil['id'].'</th>
      <td>'.$hasil['judul'].'</td>
      <td>'.substr($hasil['penjelasan'],0,200).'</td>
      <td>'.$hasil['gambar'].'</td>
      <td>'.$hasil['lokasi'].'</td>
      <td>'.$hasil['penulis'].'</td>
      <td>'.$hasil['penerbit'].'</td>
      <td>'.$hasil['tahunterbit'].'</td>
      <td><a id="panelselengkapnyamodesimplified" href="#" class="btn btn-dark" kodetogel="'.$hasil['id'].'">Panel</a></td>
      </tr>';
	}
	echo '</tbody></table>';
}

	else{
		echo '<h1>Tidak ditemukan hasil</h1>';
	}



}

if(isset($_POST['tambahpinjamanbuku'])){
	include 'db.php';
	$proses=false;
	//echo strlen($_POST['judulbuku']);
	$auth='SELECT * FROM daftar_buku WHERE judul="'.$_POST['judulbuku'].'";';
	$auth1='SELECT * FROM anggota_toshokan WHERE nama="'.$_POST['peminjam'].'";';
	$koneksi1=$conn->query($auth);
	$hasilkoneksi1=$koneksi1->fetch_assoc();
	$koneksi2=$conn->query($auth1);

	if(isset($hasilkoneksi1['stok'])) {
		if($hasilkoneksi1['stok']==0){
			print_r('#[stokbukuhabis]');
			$proses=false;
		}
		else{
			if(mysqli_num_rows($koneksi1)>0){
				$proses=true;
			}
			else{
				$proses=false;
			}
			if(mysqli_num_rows($koneksi2)>0){
				$proses=true;
			}
			else{
				$proses=false;
			}
			if($_POST['batastanggal']==''){
				$proses=false;
			}

		}
		
	}
	else{
		$proses=false;
	}

	if($proses==true){
		$jml=$hasilkoneksi1['stok']-1;
		$quer='UPDATE daftar_buku SET stok="'.$jml.'" WHERE judul="'.$_POST['judulbuku'].'";';
		$query='INSERT INTO pinjaman_buku (id,judul,peminjam,waktupinjam,bataspengembalian) VALUES (NULL,"'.$_POST['judulbuku'].'","'.$_POST['peminjam'].'","'.$_POST['tanggalkirim'].'","'.$_POST['batastanggal'].'");';
		$a=$conn->query($quer);
		if($conn->query($query)==True){
			print_r('sukses');
		}
	}
	else if($proses==false){
		print_r('#[gagal]');
	}
}

if(isset($_POST['loadkelolapinjaman'])){
	include 'db.php';
	$index=-1;
  $no=0;
	$query='SELECT * FROM pinjaman_buku ORDER BY id DESC;';
	$konek=$conn->query($query);
	while($hasil=$konek->fetch_assoc()){
		$index=$index+1;
		$no=$no+1;
    echo ' <tr id="rowpinjaman">
    <td>'.$no.'</td>
      <td>'.$hasil['judul'].'</td>
      <td>'.$hasil['peminjam'].'</td>
      <td>'.$hasil['waktupinjam'].'</td>
      <td>'.$hasil['bataspengembalian'].'</td>
      <td><button kodeindex="'.$index.'" id="'.$hasil['judul'].'" class="btn btn-success kembalikanpinjamanbuku">Dikembalikan</button><button nomortogel="'.$hasil['id'].'" class="btn btn-danger hapuskelolapinjaman">Hapus</button></td>
    </tr>
    ';
	}

}

if(isset($_POST['kembalikanpinjamanbuku'])){
	include 'db.php';
	$q='INSERT INTO log_pinjaman (id,judul,peminjam,waktupinjam,waktupengembalian,bataswaktu,denda) VALUES (NULL,"'.$_POST['query'].'","'.$_POST['peminjam'].'","'.$_POST['waktupinjam'].'","'.$_POST['waktupengembalian'].'","'.$_POST['batas'].'","'.$_POST['denda'].'");';
  var_dump($_POST['waktupengembalian']);
  if($conn->query($q)==True){
    include 'db.php';
    $t='SELECT * FROM daftar_buku WHERE judul="'.$_POST['query'].'";';
    $kon=$conn->query($t);
    $hasil=$kon->fetch_assoc();
    $stoksekarang=(int)$hasil['stok']+1;
    $a='UPDATE daftar_buku SET stok="'.$stoksekarang.'" WHERE judul="'.$_POST['query'].'";';
    if($conn->query($a)==True){
      $l='DELETE FROM pinjaman_buku WHERE judul="'.$_POST['query'].'";';
      if($conn->query($l)==True){
        print_r('sukses');
      }
      else{
        print_r('gagal');
      }
    }
    else{
      print_r('gagal');
    }
  }
  else{
    print_r('gagal');
  }
}

if(isset($_POST['hapuskelolapinjamanmas'])){
  include 'db.php';
  $q='DELETE FROM pinjaman_buku WHERE id="'.$_POST['nomortogel'].'";';
  if($conn->query($q)==True){
    print_r('sukses');
  }
  else{
    print_r('gagal');
  }
}

if(isset($_POST['kueripencaripinjaman'])){
  include 'db.php';
  $var='SELECT * FROM pinjaman_buku WHERE judul LIKE "%'.$_POST['query'].'%" OR waktupinjam LIKE "%'.$_POST['query'].'%" OR peminjam LIKE "%'.$_POST['query'].'%";';
  $koneksi=$conn->query($var);
  $index=-1;
  $no=0;
  while($hasil=$koneksi->fetch_assoc()){
    $index=$index+1;
    $no=$no+1;
    echo ' <tr id="rowpinjaman">
      <td>'.$no.'</td>
      <td>'.$hasil['judul'].'</td>
      <td>'.$hasil['peminjam'].'</td>
      <td>'.$hasil['waktupinjam'].'</td>
      <td>'.$hasil['bataspengembalian'].'</td>
      <td><button kodeindex="'.$index.'" id="'.$hasil['judul'].'" class="btn btn-success kembalikanpinjamanbuku">Dikembalikan</button><button nomortogel="'.$hasil['id'].'" class="btn btn-danger hapuskelolapinjaman">Hapus</button></td>
    </tr>
    ';
  }
}

if(isset($_POST['loadlogpinjaman'])){
  include 'db.php';
  $limit=7;
  $no=0;
  $offset=((int)$_POST['i']-1)*7;
  $q='SELECT * FROM log_pinjaman ORDER BY id ASC LIMIT 7 OFFSET '.$offset.';';
  $koneksi=$conn->query($q);
  echo '<table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Judul</th>
      <th scope="col">Peminjam</th>
      <th scope="col">Waktu Pinjam</th>
      <th scope="col">Waktu Pengembalian</th>
      <th scope="col">Batas Waktu</th>
      <th scope="col">Denda</th>
    </tr>
  </thead>
  <tbody>';
  while($hasil=$koneksi->fetch_assoc()){
    echo ' <tr>
      <th scope="row">'.$hasil['id'].'</th>
      <td>'.$hasil['judul'].'</td>
      <td>'.$hasil['peminjam'].'</td>
      <td>'.$hasil['waktupinjam'].'</td>
      <td>'.$hasil['waktupengembalian'].'</td>
      <td>'.$hasil['bataswaktu'].'</td>
      <td>'.$hasil['denda'].'</td>
    </tr>';
  }
    echo '
  </tbody>
</table>';
}

if(isset($_POST['loadpeaklimitpaglog'])){
  include 'db.php';
  $limit=7;
  $q='SELECT * FROM log_pinjaman';
  $koneksi=$conn->query($q);
  $i=floor((int)mysqli_num_rows($koneksi)/(int)$limit)+1;
  print_r($i);
}

if(isset($_POST['loadlogpinjamanstr'])){
  include 'db.php';
  $q='SELECT * FROM log_pinjaman;';
  $c=$conn->query($q);
  echo ' <textarea class="form-control" id=regexplog style="height: 250px;">';
  while($res=$c->fetch_assoc()){
   echo '['.$res['judul'].']['.$res['peminjam'].']['.$res['waktupinjam'].']['.$res['waktupengembalian'].']['.$res['bataswaktu'].']['.$res['denda'].']&#13;';
  }
  echo '</textarea>';
}

if(isset($_FILES['gambar_2'])){
  if(strlen($_FILES['gambar_2']['name'])==0){
    $img='null.jpg';
  }
  if(strlen($_FILES['gambar_2']['name'])>0){
    $img=$_FILES['gambar_2']['name'];
  }
  //move_uploaded_file($_FILES['gambar_2']['tmp_name'], 'assets/image/'.$img)
  print_r($img);
   

}

if(isset($_POST['tambahbuku'])){
  include 'db.php';
  $r='INSERT INTO daftar_buku (id,judul,penjelasan,gambar,lokasi,penulis,penerbit,tahunterbit,stok,kategori) VALUES (NULL,"'.$_POST['judul'].'","'.$_POST['deskripsi'].'","'.$_POST['file'].'","'.$_POST['lokasi'].'","'.$_POST['penulis'].'","'.$_POST['penerbit'].'","'.$_POST['tahunterbit'].'","'.$_POST['stok'].'","'.$_POST['kategori'].'");';
  if($conn->query($r)==True){
    print_r('sukses');
  }
  else{
    print_r('gagal');
  }
}


}

?>
