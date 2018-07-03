<?php
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
		    <p class="card-text">'.$konten['penjelasan'].'</p>
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
			echo '<kodetogel kodetogel="'.$hasil['id'].'" style="hidden"><img src="'.$hasil['gambar'].'" class="rounded float-left" alt="..." style="margin-top: 5px;height: 480px; width: 350px;">
        <div id="keteranganbuku">
        <form id="formketeranganbuku" style="width: 700px;float: right;max-height: 500px; overflow-y: scroll;">
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
  <button id="ubahketeranganbuku" type="button" class="btn btn-success">Ubah</button>
  <button id="hapusketeranganbuku" type="button" class="btn btn-danger">Hapus</button>
<button id="kembaliketeranganbuku" type="button" class="btn btn-primary">Kembali</button>

</form>';

		}
	}
	else{
		print_r('gagal');
	}
}

if(isset($_POST['updateketeranganbuku'])){
	include 'db.php';
	$koneksi='UPDATE daftar_buku SET judul="'.$_POST['judul'].'",penjelasan="'.$_POST['keterangan'].'",lokasi="'.$_POST['lokasi'].'",penulis="'.$_POST['penulis'].'",penerbit="'.$_POST['penerbit'].'",tahunterbit="'.$_POST['tahunterbit'].'" WHERE id="'.$_POST['nomortogel'].'";';
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

?>