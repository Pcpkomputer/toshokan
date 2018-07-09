<?php
session_start();
$title='Toshokan v1.0.0';
$tanggal=date('d/m/Y');
if(!isset($_SESSION['mode'])=='admin'){
  header('Location: /toshokan');
}
?>
<html lang="en"><head>
  <meta charset="UTF-8">
  <title>Toshokan v1.0.0</title>
  <script src="js/svgembedder.min.js"></script>
<link href="css/Poppins.css" rel="stylesheet">
    <link rel="stylesheet" href="css/reset.min.css">
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <style type="text/css">
      #guambarcuk{
        cursor: pointer;
      }

		      /*
		 *  STYLE 1
		 */

		#style-1::-webkit-scrollbar-track
		{
			-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
			border-radius: 10px;
			background-color: #F5F5F5;
		}

		#style-1::-webkit-scrollbar
		{
			width: 12px;
			background-color: #F5F5F5;
		}

		#style-1::-webkit-scrollbar-thumb
		{
			border-radius: 10px;
			-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
			background-color: #555;
		}

      </style>
</head>

<body>

	<div class="modalinputbuku" id="style-1" style="height: 1300px;max-height:648px;width: 500px;right:-500px;display: none;background-color: #1B2327;position: fixed;z-index: 100;padding: 20px;display: none;overflow-y: scroll;">
	<div class="form-group row">
  <div class="col-12">
  	<form id="formtambahbuku" enctype="multipart/form-data">
  	  <label for="exampleSelect2" style="color: white;">Judul :</label>
    <input id="ipt" name="judul" class="form-control form-control-sm" type="text" placeholder="Judul" id="example-text-input" style="float: left;">
  </div>
</div>	

	<div class="form-group row">
  <div class="col-12">
  	  <label for="exampleSelect2" style="color: white;">Keterangan Buku :</label>
    <textarea id="ipt" name="deskripsi" class="form-control form-control-sm" placeholder="......" style="height: 100px;"></textarea>
  </div>
</div>	

<div class="form-group row">
  <div class="col-12">
  	  <label for="exampleSelect2" style="color: white;">Lokasi :</label>
    <input id="ipt" name="lokasi" class="form-control form-control-sm" type="text" placeholder="Lokasi" id="example-text-input" style="float: left;">
  </div>
</div>	

<div class="form-group row">
  <div class="col-12">
  	  <label for="exampleSelect2" style="color: white;">Penulis :</label>
    <input id="ipt" name="penulis" class="form-control form-control-sm" type="text" placeholder="Penulis" id="example-text-input" style="float: left;">
  </div>
</div>	

<div class="form-group row">
  <div class="col-12">
  	  <label for="exampleSelect2" style="color: white;">Penerbit :</label>
    <input id="ipt" name="penerbit" class="form-control form-control-sm" type="text" placeholder="Penerbit" id="example-text-input" style="float: left;">
  </div>
</div>	

<div class="form-group row">
  <div class="col-12">
  	  <label for="exampleSelect2" style="color: white;">Tahun Terbit :</label>
    <input id="ipt" name="tahunterbit" class="form-control form-control-sm" type="text" placeholder="Tahun Terbit" id="example-text-input" style="float: left;">
  </div>
</div>	


<div class="form-group row">
  <div class="col-12">
  	  <label for="exampleSelect2" style="color: white;">Stok :</label>
    <input id="ipt" name="stok" class="form-control form-control-sm" type="text" placeholder="Stok" id="example-text-input" style="float: left;">
  </div>
</div>	


<div class="form-group row">
  <div class="col-12">
  	  <label for="exampleSelect2" style="color: white;">Kategori :</label>
    <input id="ipt" name="kategori" class="form-control form-control-sm" type="text" placeholder="Kategori [Pisah dengan koma]" id="example-text-input" style="float: left;">
  </div>
</div>	
</form>

<form id="imgbukuhandler" enctype="multipart/form-data">
<div class="form-group row">
  <div class="col-12">
  	  <label for="exampleSelect2" style="color: white;">Gambar :</label>
    <input id="ipt" name="gambar_2" class="form-control form-control-sm" type="file" style="float: left;">
  </div>
</div>	
</form>

<button id="simpanmodaladd" class="btn btn-success">Simpan</button>
<button id="btlmodaladd" class="btn btn-danger">Batal</button>


	</div>


  <div class="sidebar">
  
  <div class="sidebar__subsections">
    <div class="sidebar__subsections-brand"><?php echo $title;?><label style="font-size: 10px;margin-left: 5px;">[panel admin]</label></div>
    <ul>
      <li><a href="#" id="kelolabuku">Kelola Buku</a></li>
       <li><a href="#" id="kelolaanggota">Kelola Anggota</a></li>
       <li><a href="#" id="kelolapinjaman">Kelola Pinjaman</a></li>
    </ul>
  </div>
</div>
<div class="page">
  
  <div class="header">
  	<?php
      	include 'db.php';
      	$sql='SELECT * from daftar_buku;';
      	$hasil=$conn->query($sql);
      	echo '<div id="peaklimit" style="display:none;">'.mysqli_num_rows($hasil).'</div>';
      	?>
    <div class="header__search">
      <input id="pencarian" type="text" placeholder="Pencarian...">
       <input id="pencarianmodesimplified" type="text" placeholder="Pencarian... [Mode Simplified]" style="display: none;">
    </div>
    <div class="header__date">
      <span id="date"><?php echo $tanggal;?></span>
    </div>
    <div class="header__user">
      Halo, <?php if(isset($_SESSION['nama'])){ echo $_SESSION['nama'];} else{ echo '??????';} ?> <svg class="lnr lnr-cog icon"><use xlink:href="#lnr-cog"></use></svg>

<div id="dropdownn" class="dropdown-menu dropdown-menu-right show" x-placement="bottom-end" style="display: none;position: absolute; transform: translate3d(-35px, 45px, 0px); top: 0px; right: 0px; will-change: transform">
	  <h6 class="dropdown-header">Menu Atas</h6>
    <button id="btnstatistik" class="dropdown-item" type="button">Statistik</button>
      <div class="dropdown-divider"></div>
    <button id="btnlogout" class="dropdown-item" type="button">Logout</button>
  </div>


    </div>
  </div>
  
  <div class="content">
    
    <div class="content__main">

    <div id="panelkelolastatistik" class="content__main-page" style="display: none;">
     <hr>
        <h1>Kelola Statistik</h1>
       
        <hr>
        <input class="form-control" type="text" name="">
    </div>

    <div class="content__main-page" id="logkelolabuku" style="display:none;">
      <hr>
        <h1>Log Pinjaman</h1>
      <hr>
      <div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-pills card-header-pills">
      <li class="nav-item">
        <a id="riwayatpeminjaman" class="nav-link active navigasilogpinjaman" style="background-color: #28a745" href="#">Riwayat Peminjaman</a>
      </li>
      <li class="nav-item">
        <a id="logpeminjaman" class="nav-link navigasilogpinjaman" style="" href="#">Log Pinjaman</a>
      </li>
    </ul>
  </div>
  <div id="riwayatpeminjaman-body" class="card-body">
  	<label style="float: right;">Total Denda : <label id="totaldenda"><?php 
  	include 'db.php';
  	$totaldenda=0;
  	$q='SELECT denda FROM log_pinjaman;';
  	$koneksi=$conn->query($q);
  	while($res=$koneksi->fetch_assoc()){
  		$totaldenda+=(int)$res['denda'];
  	}
  	echo 'Rp.'.$totaldenda;
  	?></label></label>
  	 <nav aria-label="..." id="paginationpinjaman">
  <ul class="pagination pagination-sm">
    <li id="sebelumnyalog" class="page-item disabled"><a class="page-link" href="#">Sebelumnya</a></li>
    <li id="crlog" class="page-item disabled"><a id="currentlog" class="page-link" href="#">1</a></li>
    <li id="berikutnyalog" class="page-item"><a class="page-link" href="#">Berikutnya</a></li>
  </ul>
</nav>
  	<div id="riwayatpeminjaman-body-konten">
  	</div>
  </div>


  

   <div id="logpeminjaman-body" class="card-body" style="display:none;">
   
    
  </div>
</div>
    </div>

 <div id="statistik-body" class="content__main-page" style="display:none;">
    <hr>
    <h1>Statistik</h1>
    <hr>

<div class="card">
  <div class="card-body">
    <h5 class="card-title" style="text-align: center"><u>Total Buku</u></h5>
    <p class="card-text" style="text-align: center;font-size: 50px"><?php include 'db.php'; $q='SELECT * FROM daftar_buku'; $koneksi=$conn->query($q); echo mysqli_num_rows($koneksi); ?></p>
  </div>
</div>

<div class="card"">
   <div class="card-body">
    <h5 class="card-title" style="text-align: center"><u>Total Anggota Toshokan</u></h5>
    <p class="card-text" style="text-align: center;font-size: 50px"><?php include 'db.php'; $q='SELECT * FROM anggota_toshokan'; $koneksi=$conn->query($q); echo mysqli_num_rows($koneksi); ?></p>
  </div>
</div>

<div class="card"">
   <div class="card-body">
    <h5 class="card-title" style="text-align: center"><u>Total Pengurus Toshokan</u></h5>
    <p class="card-text" style="text-align: center;font-size: 50px"><?php include 'db.php'; $q='SELECT * FROM pengurus_toshokan'; $koneksi=$conn->query($q); echo mysqli_num_rows($koneksi); ?></p>
  </div>
</div>

<div class="card"">
   <div class="card-body">
    <h5 class="card-title" style="text-align: center"><u>Total Pinjaman Pending</u></h5>
    <p class="card-text" style="text-align: center;font-size: 50px"><?php include 'db.php'; $q='SELECT * FROM pinjaman_buku'; $koneksi=$conn->query($q); echo mysqli_num_rows($koneksi); ?></p>
  </div>
</div>

<div class="card"">
   <div class="card-body">
    <h5 class="card-title" style="text-align: center"><u>Total Pinjaman</u></h5>
    <p class="card-text" style="text-align: center;font-size: 50px"><?php include 'db.php'; $q='SELECT * FROM log_pinjaman'; $koneksi=$conn->query($q); echo mysqli_num_rows($koneksi); ?></p>
  </div>
</div>

<div class="card"">
   <div class="card-body">
    <h5 class="card-title" style="text-align: center"><u>Total Denda</u></h5>
    <p class="card-text" style="text-align: center;font-size: 50px"><?php include 'db.php'; $q='SELECT denda FROM log_pinjaman'; $koneksi=$conn->query($q); 
    $tt=0;
    while($hasil=$koneksi->fetch_assoc()){
    $tt=$tt+$hasil['denda'];
    }
    echo 'Rp.'.$tt;
    ?></p>
  </div>
</div>

  </div>

         <div id="panelkelolabukumode2" class="content__main-page" style="display: none">
      

      </div>

       <div id="panelkelolapinjaman" class="content__main-page" style="display: none">
        <hr>
        <h1>Kelola Pinjaman</h1>
        <select class="form-control modekelolapinjaman" style="width: 150px;float: right;margin-top:-45px;">
       <option>Kelola Pinjaman</option>
         <option>Log Pinjaman</option>
        </select>
        <hr>
        <button id="btntambahpinjaman" type="button" class="btn btn-success" style="margin-bottom: 10px;float: left;">Tambah Pinjaman</button>
        <input id="kueripencarianpinjaman" class="form-control" style="margin-left: 3px;width: 350px;float: left" type="text" name="" placeholder="Kueri Pencarian">

          <form id="formkelolapinjaman" name="formkelolapinjaman" style="display: none;">
        <input style="margin-bottom: 4px;" class="form-control" list="judulbuku" name="judulbuku" placeholder="Judul Buku">
        <?php
        include 'db.php';
        $q='SELECT * FROM daftar_buku;';
        $koneksi=$conn->query($q);
        echo '<datalist id="judulbuku">';
        while($hasil=$koneksi->fetch_assoc()){
          echo '
          <option value="'.$hasil['judul'].'">';
        }
        echo ' </datalist>';
        ?>

        <input class="form-control" list="peminjam" name="peminjam" placeholder="Peminjam">
        <?php
        include 'db.php';
        $q='SELECT * FROM anggota_toshokan;';
        $koneksi=$conn->query($q);
        echo '<datalist id="peminjam">';
        while($hasil=$koneksi->fetch_assoc()){
          echo '
          <option value="'.$hasil['nama'].'">';
        }
        echo ' </datalist>';
        ?>
        <label style="margin-left: 3px;margin-top: 5px;">Batas Pengembalian :</label>
        <input type="date" style="margin-top: 1px;" class="form-control" name="batastanggal">
        <button id="tambahpinjamanbuku" class="btn btn-success" style="width: 1080px; margin-top: 10px;">Tambah</button>
      </form>



        <table class="table table-sm table-light table-hover" style="margin-top:15px;">
  <thead>
    <tr>
    	<th scope="col">No</th>
      <th scope="col">Judul Buku</th>
      <th scope="col">Peminjam</th>
      <th scope="col">Waktu Pinjam</th>
      <th scope="col">Batas Pengembalian</th>
      <th scope="col">@Panel</th>
    </tr>
  </thead>
  <tbody id="isibodypinjaman">

  </tbody>
</table>
      </div>

      <div id="panelkelolabuku" class="content__main-page">
      	<hr id="kududihidden">
      	<button id="btnkuduhidden" class="btn btn-success" style="float: right;margin-right: 105px;margin-top: 3.5px">+</button><h1 id="kududihidden">Kelola Buku</h1>
        <select id="kududihidden" class="form-control modekelolabuku" style="width: 100px;float: right;margin-top:-45px;">
  <option>Mode 1</option>
  <option>Mode 2</option>
</select>
      	<div id="kontenkelolabuku">
      	<?php
      	include 'db.php';
      	$sql='SELECT * from daftar_buku ORDER BY id DESC LIMIT 2 OFFSET 0;';
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
      	?>
      </div>
      <div id="paginasi">
      	<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li id="sebelum" class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1">Previous</a>
    </li>
    <li id="indexpagination" class="page-item disabled"><a class="page-link" href="#">1</a></li>
    <li  id="sesudah" class="page-item ">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
</nav>
</div>
      </div>
<div id="modialya" style="display: none;z-index: 100;">

	</div>

       <div id="panelkelolaanggota" style="display: none;" class="content__main-page">
      	<hr>
      	<h1>Kelola Anggota</h1>
      	<hr>
      	<div id="kontenkelolaanggota">
      		
      		<div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a id="btnanggotatoshokan" class="nav-link active" href="#">Anggota Toshokan</a>
      </li>
      <li class="nav-item">
        <a id="btnpengurustoshokan" class="nav-link" href="#">Pengurus Toshokan</a>
      </li>
    </ul>
  </div>
  <div id="kelolaanggotatoshokan" class="card-body">
 
  </div>
  <div id="kelolapengurustoshokan" class="card-body" style="display: none;">
 
  </div>
</div>


      </div>

      </div>



      <div class="content__main-sidebar" id="status">
        
      </div>
    </div>
  </div>
</div>
    <script src="js/index.js"></script>
    <script src="jquery.min.js"></script>
	<script src="js/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
	<script type="text/javascript">
	var peaklimitpaglog=[];

  $(document).on('click', '#btnlogout', function(e){
    $.ajax({
      url:'api.php',
      type:'POST',
      data:'logoutadmin=true',
      success: function(res){
        alert('123');
        location.href='index.php';
      },
      error: function(err){
        console.log(err);
      }
    })
  })

	$(document).on('mouseout', '#dropdownn', function(e){
		document.getElementById('dropdownn').style.display='none';
	})

	$(document).on('mouseover', '#dropdownn', function(e){
		document.getElementById('dropdownn').style.display='';
	})

	$.ajax({
		type:'POST',
		url:'api.php',
		data:'loadpeaklimitpaglog=true',
		success: function(res){
			peaklimitpaglog.push(parseInt(res));		
		},
		error: function(err){
			console.log(err);
		}
	})

	$(document).on('click', '#simpanmodaladd', function(e){
		e.preventDefault();
		let a=$('#formtambahbuku').serialize();
		var formData=new FormData($('#imgbukuhandler')[0]);
		$.ajax({
			 url: 'api.php',
		      type: 'POST',
		      data: formData,
		      async: false,
		      cache: false,
		      contentType: false,
		      enctype: 'multipart/form-data',
		      processData: false,
			success: function(res){
				$.ajax({
					url:'api.php',
					type:'POST',
					data:a+'&file='+res+'&tambahbuku=true',
					success: (res)=>{
						 $.ajax({
					        type:'POST',
					        data:'ifetch=1',
					        url:'api.php',
					        success: function(response){
					        	tidaksembunyi(document.getElementById('btnkuduhidden'));
					        	
					           document.querySelectorAll('#kududihidden')[0].style.display='';
					          document.querySelectorAll('#kududihidden')[1].style.display='';
					          document.querySelectorAll('#kududihidden')[2].style.display='';
					          awal=1;
					          document.querySelector('#paginasi').innerHTML='<nav aria-label="Page navigation example"><ul class="pagination justify-content-center"><li id="sebelum" class="page-item disabled"><a class="page-link" href="#" tabindex="-1">Previous</a></li><li id="indexpagination" class="page-item disabled"><a class="page-link" href="#">1</a></li><li  id="sesudah" class="page-item "><a class="page-link" href="#">Next</a></li></ul></nav>'
					          document.getElementById('kontenkelolabuku').innerHTML=response;
					          var a=document.querySelectorAll('#ipt');
					          a.forEach((val,i)=>{
					          	val.value='';
					          })
					        },
					        error: function(error){
					          console.log(error);
					        }

					      })
					},
					error: (err)=>{
						console.log(err);
					}
				})
			},
			error: (err)=>{
				console.log(err);
			}
		})
	})

	$(document).on('click', '#sebelumnyalog', function(e){
		var current=document.getElementById('currentlog').innerHTML;
		if(document.getElementById('currentlog').innerHTML=='2'){
			e.currentTarget.classList.add('disabled');
			document.getElementById('berikutnyalog').classList.remove('disabled');
			document.getElementById('currentlog').innerHTML=parseInt(document.getElementById('currentlog').innerHTML)-1;
			$.ajax({
			        url:'api.php',
			        type:'POST',
			        data:'loadlogpinjaman=true&i='+document.getElementById('currentlog').innerHTML,
			        success: function(e){
			          document.getElementById('riwayatpeminjaman-body-konten').innerHTML=e;
			        },
			        error: function(err){
			          console.log(err);
			        }
		      })
		}
		if(document.getElementById('currentlog')=='1'){
			console.log('passing');
		}
		if(parseInt(document.getElementById('currentlog').innerHTML)>2){
			e.currentTarget.classList.remove('disabled');
			document.getElementById('berikutnyalog').classList.remove('disabled');
			document.getElementById('currentlog').innerHTML=parseInt(document.getElementById('currentlog').innerHTML)-1;
			$.ajax({
			        url:'api.php',
			        type:'POST',
			        data:'loadlogpinjaman=true&i='+document.getElementById('currentlog').innerHTML,
			        success: function(e){
			          document.getElementById('riwayatpeminjaman-body-konten').innerHTML=e;
			        },
			        error: function(err){
			          console.log(err);
			        }
		      })
		}
	})	

	$(document).on('click', '#berikutnyalog', function(e){
			let i=parseInt(document.getElementById('currentlog').innerHTML)+1;
			if(i==peaklimitpaglog[0]){
				document.getElementById('currentlog').innerHTML=parseInt(document.getElementById('currentlog').innerHTML);
				document.getElementById('berikutnyalog').classList.add('disabled');
				$.ajax({
			        url:'api.php',
			        type:'POST',
			        data:'loadlogpinjaman=true&i='+i,
			        success: function(e){
			          document.getElementById('riwayatpeminjaman-body-konten').innerHTML=e;
			        },
			        error: function(err){
			          console.log(err);
			        }
		      })
			}
			if(i>peaklimitpaglog[0]){
				console.log('passing');
			}
			else{
				document.getElementById('currentlog').innerHTML=parseInt(document.getElementById('currentlog').innerHTML)+1;
				document.getElementById('sebelumnyalog').classList.remove('disabled');
				$.ajax({
			        url:'api.php',
			        type:'POST',
			        data:'loadlogpinjaman=true&i='+i,
			        success: function(e){
			          document.getElementById('riwayatpeminjaman-body-konten').innerHTML=e;
			        },
			        error: function(err){
			          console.log(err);
			        }
		      })
			}		
	})


	</script>
	<script type="text/javascript">
    //Padang Perwira Yudha
    //28 Juni 2018
	var limit=2;
	var offset=0;
	var peaklimit=parseInt(document.querySelector('#peaklimit').innerText)/limit;
	var peaklimit=Math.round(peaklimit);
	console.log(peaklimit);

	var cilukba=function(){
		document.querySelector('#pencarian').style.display='none';
		document.querySelector('#panelkelolabuku').style.display='none';
		document.querySelector('#panelkelolaanggota').style.display='none';
    document.querySelector('#panelkelolapinjaman').style.display='none';
    document.querySelector('#panelkelolabukumode2').style.display='none';
    document.querySelector('#panelkelolastatistik').style.display='none';
    document.querySelectorAll('#logkelolabuku')[0].style.display='none';
    sembunyi(document.querySelectorAll('#pencarianmodesimplified')[0]);
    document.querySelectorAll('.modalinputbuku')[0].style.display='none';
    document.querySelectorAll('.modalinputbuku')[0].style.right=-500;
    document.querySelectorAll('#statistik-body')[0].style.display='none';
	}

  var modekelolabukurefresh=function(){
    document.querySelector('.modekelolabukumode2').value='Mode 1';
    document.querySelector('.modekelolabuku').value='Mode 1';
  }

  var tidaksembunyi=function(obj){
    obj.style.display='';
  }

  var sembunyi=function(obj){
    obj.style.display='none';
  }

	var awal=parseInt(document.querySelectorAll('#indexpagination')[0].innerText);

	$(document).on('click', '#btnstatistik', (e)=>{
		cilukba();
		tidaksembunyi(document.getElementById('statistik-body'));
	})

	$(document).on('mouseout', '.lnr-cog', function(e){
		document.getElementById('dropdownn').style.display='none';
	})

	$(document).on('mouseover', '.lnr-cog', function(e){
		document.getElementById('dropdownn').style.display='';
	})

	$(document).on('click','#btlmodaladd', function(e){
		e.preventDefault();
		var range=0;
		var interval=setInterval(sip,6);
		function sip(){
			range=range-20;
			document.querySelectorAll('.modalinputbuku')[0].style.right=range+'px';
			console.log(document.querySelectorAll('.modalinputbuku')[0].style.right);
			if(document.querySelectorAll('.modalinputbuku')[0].style.right=='-500px'){
				clearInterval(interval);
				document.querySelectorAll('.modalinputbuku')[0].style.display='none';
				document.querySelectorAll('.modalinputbuku')[0].style.right='-500px';
			}
		}
	})


$(document).on('click', '#btnkuduhidden2', function(e){
		var range=-500;
		var interval=setInterval(lotto,6);
		document.querySelectorAll('.modalinputbuku')[0].style.display='';
		function lotto(){
			range=range+20;
			console.log(range);
			document.querySelectorAll('.modalinputbuku')[0].style.right=range+'px';
			console.log(document.querySelectorAll('.modalinputbuku')[0].style.right);
			if(document.querySelectorAll('.modalinputbuku')[0].style.right=='0px'){
				clearInterval(interval);
				document.querySelectorAll('.modalinputbuku')[0].style.right='0px';
			}

		}

	})


	$(document).on('click', '#btnkuduhidden', function(e){
		var range=-500;
		var interval=setInterval(lotto,6);
		document.querySelectorAll('.modalinputbuku')[0].style.display='';
		function lotto(){
			range=range+20;
			console.log(range);
			document.querySelectorAll('.modalinputbuku')[0].style.right=range+'px';
			console.log(document.querySelectorAll('.modalinputbuku')[0].style.right);
			if(document.querySelectorAll('.modalinputbuku')[0].style.right=='0px'){
				clearInterval(interval);
				document.querySelectorAll('.modalinputbuku')[0].style.right='0px';
			}

		}

	})

	$(document).on('click', '#logpeminjaman', function(e){
		document.querySelectorAll('#riwayatpeminjaman-body')[0].style.display='none';
		document.querySelectorAll('#logpeminjaman-body')[0].style.display='';
		document.getElementById('riwayatpeminjaman').style.backgroundColor='';
		e.currentTarget.style.backgroundColor='#28a745';

	})

	$(document).on('click', '#riwayatpeminjaman', function(e){
		document.querySelectorAll('#logpeminjaman-body')[0].style.display='none';
		document.querySelectorAll('#riwayatpeminjaman-body')[0].style.display='';
		document.getElementById('logpeminjaman').style.backgroundColor='';
		e.currentTarget.style.backgroundColor='#28a745';
		
	})

  $(document).on('click', '.navigasilogpinjaman', (event)=>{
  	event.preventDefault();
  	let nav=document.querySelectorAll('.navigasilogpinjaman');
  	nav.forEach((val,i)=>{
  		val.classList.remove('active');
  	})
  	event.currentTarget.classList.add('active');
  })

  $(document).on('input', '#kueripencarianpinjaman', (e)=>{
    $.ajax({
      url:'api.php',
      type:'POST',
      data:'kueripencaripinjaman=true&query='+e.currentTarget.value,
      success: function(res){
        document.getElementById('isibodypinjaman').innerHTML=res;
         document.querySelectorAll('.modekelolapinjaman')[0].value='Kelola Pinjaman';
        var rowpinjaman=document.querySelectorAll('#rowpinjaman');
        var tglsekarang=document.getElementById('date').innerHTML;
        var x=/(\d+)\/(\d+)\/(\d+)/.exec(tglsekarang);
        var t=parseInt(x[3])*360;
        var b=parseInt(x[2])*30;  
        var h=parseInt(x[1]);
        var date=t+b+h;

        rowpinjaman.forEach((a,b)=>{
        var hasil=/<td>\d+-\d+-\d+<\/td>\s+<td>(\d+-\d+-\d+)<\/td>/.exec(a.innerHTML)[1];
        var a=/(\d+)-(\d+)-(\d+)/.exec(hasil);
        var tahun=parseInt(a[1])*360;
        var bulan=parseInt(a[2])*30;
        var hari=parseInt(a[3]);
        var dd=tahun+bulan+hari;
        var hash=date-dd;
       console.log(hash);
        var hashstr=hash.toString();

         if(hash>0){
        document.querySelectorAll('#rowpinjaman')[b].classList.add('table-danger');
        }

        if(hash<0){
        document.querySelectorAll('#rowpinjaman')[b].classList.add('table-success');
      
        }

        if(hashstr=='0'){
        document.querySelectorAll('#rowpinjaman')[b].classList.add('table-warning');
        }
  
      
        })


      },
      error: function(err){
        console.log(err);
      }
    })
  })

  $(document).on('input', '.modekelolapinjaman', function(e){
    if(e.currentTarget.value.match('Kelola')){
      alert('kelola pinjaman');
    }
    if(e.currentTarget.value.match('Log')){
      cilukba();
      document.querySelectorAll('#logkelolabuku')[0].style.display='';
      let i=document.getElementById('currentlog').innerHTML;
      $.ajax({
        url:'api.php',
        type:'POST',
        data:'loadlogpinjamanstr=true&i='+i,
        success: function(e){
          document.querySelectorAll('#logpeminjaman-body')[0].innerHTML=e;
        },
        error: function(err){
          console.log(err);
        }
      })

      $.ajax({
        url:'api.php',
        type:'POST',
        data:'loadlogpinjaman=true&i='+i,
        success: function(e){
          document.getElementById('riwayatpeminjaman-body-konten').innerHTML=e;
        },
        error: function(err){
          console.log(err);
        }
      })
    }
  })

  $(document).on('click','#kelolastatistik', (e)=>{
    cilukba();
    document.querySelectorAll('#panelkelolastatistik')[0].style.display='';
  })

  $(document).on('click', '.hapuskelolapinjaman', (e)=>{
    let nomortogel=/nomortogel=\"(\d+)\"/.exec(e.currentTarget.outerHTML)[1];
    $.ajax({
      type:'POST',
      data:'hapuskelolapinjamanmas=true&nomortogel='+nomortogel,
      url:'api.php',
      success: function(res){
         $.ajax({
      type:'POST',
      data:'loadkelolapinjaman=true',
      url:'api.php',
      success: function(res){
        document.getElementById('kueripencarianpinjaman').value="";
        document.getElementById('isibodypinjaman').innerHTML=res;
        document.querySelectorAll('.modekelolapinjaman')[0].value='Kelola Pinjaman';
        var rowpinjaman=document.querySelectorAll('#rowpinjaman');
        var tglsekarang=document.getElementById('date').innerHTML;
        var x=/(\d+)\/(\d+)\/(\d+)/.exec(tglsekarang);
        var t=parseInt(x[3])*360;
        var b=parseInt(x[2])*30;  
        var h=parseInt(x[1]);
        var date=t+b+h;

        rowpinjaman.forEach((a,b)=>{
        var hasil=/<td>\d+-\d+-\d+<\/td>\s+<td>(\d+-\d+-\d+)<\/td>/.exec(a.innerHTML)[1];
        var a=/(\d+)-(\d+)-(\d+)/.exec(hasil);
        var tahun=parseInt(a[1])*360;
        var bulan=parseInt(a[2])*30;
        var hari=parseInt(a[3]);
        var dd=tahun+bulan+hari;
        var hash=date-dd;
        console.log(hash);
        var hashstr=hash.toString();

         if(hash>0){
        document.querySelectorAll('#rowpinjaman')[b].classList.add('table-danger');
        }

        if(hash<0){
        document.querySelectorAll('#rowpinjaman')[b].classList.add('table-success');
      
        }

        if(hashstr=='0'){
        document.querySelectorAll('#rowpinjaman')[b].classList.add('table-warning');
        }
  
      
        })


      },
      error: function(err){
        console.log(err);
      }
    })
      },
      error: function(err){
        console.log(err);
      }
    })
  })

  $(document).on('click', '.kembalikanpinjamanbuku', (e)=>{

    let tglsekarang=document.getElementById('date').innerHTML;
    let x=/(\d+)\/(\d+)\/(\d+)/.exec(tglsekarang);
    let t=parseInt(x[3])*360;
    let b=parseInt(x[2])*30;  
    let h=parseInt(x[1]);
    let date=t+b+h;
    var denda=0;
    let index=/kodeindex=\"(\d+)\"/.exec(e.currentTarget.outerHTML)[1];
    let i=document.querySelectorAll('#rowpinjaman')[index];
    let hasil=/<td>\d+-\d+-\d+<\/td>\s+<td>(\d+-\d+-\d+)<\/td>/.exec(i.outerHTML)[1];
    let a=/(\d+)-(\d+)-(\d+)/.exec(hasil);
    let tahun=parseInt(a[1])*360;
    let bulan=parseInt(a[2])*30;
    let hari=parseInt(a[3]);
    let dd=tahun+bulan+hari;
    let hash=date-dd;
    if(hash<0){
      denda=0;
    }
    if(hash>0){
      denda=hash*12000;
    }
    if(hash=0){
      denda=0;
    }
    //alert(denda);
    let query=(e.currentTarget.id);
    let z=/<td>([^<]+)<\/td>\s+<td>([^<]+)<\/td>\s+<td>([^<]+)<\/td>\s+<td>([^<]+)<\/td>\s+/.exec(i.outerHTML);
    console.log(i.outerHTML);
    let judul=z[1];
    let peminjam=z[2];
    let waktupinjam=z[3];
    let batas=z[4];
    let pattern=/(\d+)\/(\d+)\/(\d+)/.exec(tglsekarang);
    let s=pattern[3]+'-'+pattern[2]+'-'+pattern[1];
    console.log(s);
    $.ajax({
      type:'POST',
      url:'api.php',
      data:'kembalikanpinjamanbuku=true&query='+query+'&denda='+denda+'&peminjam='+peminjam+'&waktupinjam='+waktupinjam+'&waktupengembalian='+s+'&batas='+batas,
      success: function(res){
        $.ajax({
      type:'POST',
      data:'loadkelolapinjaman=true',
      url:'api.php',
      success: function(res){
        document.getElementById('kueripencarianpinjaman').value="";
        document.getElementById('isibodypinjaman').innerHTML=res;
        document.querySelectorAll('.modekelolapinjaman')[0].value='Kelola Pinjaman';
        var rowpinjaman=document.querySelectorAll('#rowpinjaman');
        var tglsekarang=document.getElementById('date').innerHTML;
        var x=/(\d+)\/(\d+)\/(\d+)/.exec(tglsekarang);
        var t=parseInt(x[3])*360;
        var b=parseInt(x[2])*30;  
        var h=parseInt(x[1]);
        var date=t+b+h;

        rowpinjaman.forEach((a,b)=>{
        var hasil=/<td>\d+-\d+-\d+<\/td>\s+<td>(\d+-\d+-\d+)<\/td>/.exec(a.innerHTML)[1];
        var a=/(\d+)-(\d+)-(\d+)/.exec(hasil);
        var tahun=parseInt(a[1])*360;
        var bulan=parseInt(a[2])*30;
        var hari=parseInt(a[3]);
        var dd=tahun+bulan+hari;
        var hash=date-dd;
        console.log(hash);
        var hashstr=hash.toString();

         if(hash>0){
        document.querySelectorAll('#rowpinjaman')[b].classList.add('table-danger');
        }

        if(hash<0){
        document.querySelectorAll('#rowpinjaman')[b].classList.add('table-success');
      
        }

        if(hashstr=='0'){
        document.querySelectorAll('#rowpinjaman')[b].classList.add('table-warning');
        }
  
      
        })


      },
      error: function(err){
        console.log(err);
      }
    })
      },
      error: function(err){
        console.log(err);
      }
    })
  })

  $(document).on('dblclick', '#rowpinjaman', function(e){
    if(e.currentTarget.classList.value.match('danger')){
      let tglsekarang=document.getElementById('date').innerHTML;
      let x=/(\d+)\/(\d+)\/(\d+)/.exec(tglsekarang);
      let t=parseInt(x[3])*360;
      let b=parseInt(x[2])*30;  
      let h=parseInt(x[1]);
      let date=t+b+h;

      let hasil=/<td>\d+-\d+-\d+<\/td>\s+<td>(\d+-\d+-\d+)<\/td>/.exec(e.currentTarget.outerHTML)[1];
      let a=/(\d+)-(\d+)-(\d+)/.exec(hasil);
      let tahun=parseInt(a[1])*360;
      let bulan=parseInt(a[2])*30;
      let hari=parseInt(a[3]);
      let dd=tahun+bulan+hari;
      let hash=date-dd;
      alert('Sudah lewat selama : '+hash+' hari');
    }
    if(e.currentTarget.classList.value.match('warning')){
      let tglsekarang=document.getElementById('date').innerHTML;
      let x=/(\d+)\/(\d+)\/(\d+)/.exec(tglsekarang);
      let t=parseInt(x[3])*360;
      let b=parseInt(x[2])*30;  
      let h=parseInt(x[1]);
      let date=t+b+h;

      let hasil=/<td>\d+-\d+-\d+<\/td>\s+<td>(\d+-\d+-\d+)<\/td>/.exec(e.currentTarget.outerHTML)[1];
      let a=/(\d+)-(\d+)-(\d+)/.exec(hasil);
      let tahun=parseInt(a[1])*360;
      let bulan=parseInt(a[2])*30;
      let hari=parseInt(a[3]);
      let dd=tahun+bulan+hari;
      let hash=date-dd;
      alert('Sudah lewat selama : '+hash+' hari');
    }
    if(e.currentTarget.classList.value.match('success')){
      let tglsekarang=document.getElementById('date').innerHTML;
      let x=/(\d+)\/(\d+)\/(\d+)/.exec(tglsekarang);
      let t=parseInt(x[3])*360;
      let b=parseInt(x[2])*30;  
      let h=parseInt(x[1]);
      let date=t+b+h;

      let hasil=/<td>\d+-\d+-\d+<\/td>\s+<td>(\d+-\d+-\d+)<\/td>/.exec(e.currentTarget.outerHTML)[1];
      let a=/(\d+)-(\d+)-(\d+)/.exec(hasil);
      let tahun=parseInt(a[1])*360;
      let bulan=parseInt(a[2])*30;
      let hari=parseInt(a[3]);
      let dd=tahun+bulan+hari;
      let hash=date-dd;
      alert('Sudah lewat selama : '+hash+' hari');
    }
  })

  $(document).on('click', '#kelolapinjaman', function(e){
    e.preventDefault();
    $.ajax({
      type:'POST',
      data:'loadkelolapinjaman=true',
      url:'api.php',
      success: function(res){
        document.getElementById('isibodypinjaman').innerHTML=res;
        document.getElementById('kueripencarianpinjaman').value="";
        document.querySelectorAll('.modekelolapinjaman')[0].value='Kelola Pinjaman';
        var rowpinjaman=document.querySelectorAll('#rowpinjaman');
        var tglsekarang=document.getElementById('date').innerHTML;
        var x=/(\d+)\/(\d+)\/(\d+)/.exec(tglsekarang);
        var t=parseInt(x[3])*360;
        var b=parseInt(x[2])*30;  
        var h=parseInt(x[1]);
        var date=t+b+h;

        rowpinjaman.forEach((a,b)=>{
        var hasil=/<td>\d+-\d+-\d+<\/td>\s+<td>(\d+-\d+-\d+)<\/td>/.exec(a.innerHTML)[1];
        var a=/(\d+)-(\d+)-(\d+)/.exec(hasil);
        var tahun=parseInt(a[1])*360;
        var bulan=parseInt(a[2])*30;
        var hari=parseInt(a[3]);
        var dd=tahun+bulan+hari;
        var hash=date-dd;
        console.log(hash);
        var hashstr=hash.toString();

         if(hash>0){
        document.querySelectorAll('#rowpinjaman')[b].classList.add('table-danger');
        }

        if(hash<0){
        document.querySelectorAll('#rowpinjaman')[b].classList.add('table-success');
      
        }

        if(hashstr=='0'){
        document.querySelectorAll('#rowpinjaman')[b].classList.add('table-warning');
        }
  
      
        })


      },
      error: function(err){
        console.log(err);
      }
    })
  })

  $(document).on('click', '#tambahpinjamanbuku', function(e){
    e.preventDefault();
    var data=$('#formkelolapinjaman').serialize();
    var tanggalskr=document.getElementById('date').innerHTML.replace(/\//g,'-');
    var tanggalskr=/(\d+)-(\d+)-(\d+)/.exec(tanggalskr);
    var tgl=tanggalskr[3]+'-'+tanggalskr[2]+'-'+tanggalskr[1];
    var data=data+'&tambahpinjamanbuku=true&tanggalkirim='+tgl;
    $.ajax({
      url:'api.php',
      type:'POST',
      data:data,
      success: function(res){
        if(res.match(/#\[stokbukuhabis]/)){
          alert('Stok buku habis / Sedang dipinjam');
        }
        if(res.match(/#\[gagal]/)){
          console.log('gagal');
        }
        if(res.match('sukses')){
          console.log(res);
        }
      },
      error: function(err){
        console.log(err);
      }
    })
  })

  $(document).on('click', '#btntambahpinjaman', (e)=>{
    if(e.currentTarget.outerHTML.match('Tambah Pinjaman')){
    document.getElementById('formkelolapinjaman').style.display='';
    sembunyi(document.getElementById('kueripencarianpinjaman'));
    e.currentTarget.outerHTML='<button id="btntambahpinjaman" type="button" class="btn btn-success" style="margin-bottom: 10px;float: left;">Tutup</button>';
    }
    else if(e.currentTarget.outerHTML.match('Tutup')){
    document.getElementById('formkelolapinjaman').style.display='none';
    tidaksembunyi(document.getElementById('kueripencarianpinjaman'));
    e.currentTarget.outerHTML='<button id="btntambahpinjaman" type="button" class="btn btn-success" style="margin-bottom: 10px;float: left;">Tambah Pinjaman</button>';
    }
    

  })

  $(document).on('input', '#guambar', (e)=>{
    e.preventDefault();
    var formData= new FormData($('#formgambar')[0]);
    console.log(formData);
    let kodetogel=/kodetogel=\"(\d+)\"/.exec(document.getElementById('kontenkelolabuku').innerHTML)[1];
    $.ajax({
      url: 'imagehandler.php',
      type: 'POST',
      data: formData,
      async: false,
      cache: false,
      contentType: false,
      enctype: 'multipart/form-data',
      processData: false,
      success: function(response){
        $.ajax({
          url:'imagehandler.php',
          type:'POST',
          data:'updatestringgambar=true&kodetogel='+kodetogel+'&namafile='+response,
          success: function(response){
            $.ajax({
                type:'POST',
                data:'ifetch=1',
                url:'api.php',
                success: function(response){
                	tidaksembunyi(document.getElementById('btnkuduhidden'));
                	
                   document.querySelectorAll('#kududihidden')[0].style.display='';
                  document.querySelectorAll('#kududihidden')[1].style.display='';
                  document.querySelectorAll('#kududihidden')[2].style.display='';
                  document.querySelector('.modekelolabuku').value='Mode 1';
                  document.querySelectorAll('#pencarian')[0].style.display='';
                  awal=1;
                  document.querySelector('#paginasi').innerHTML='<nav aria-label="Page navigation example"><ul class="pagination justify-content-center"><li id="sebelum" class="page-item disabled"><a class="page-link" href="#" tabindex="-1">Previous</a></li><li id="indexpagination" class="page-item disabled"><a class="page-link" href="#">1</a></li><li  id="sesudah" class="page-item "><a class="page-link" href="#">Next</a></li></ul></nav>'
                  document.getElementById('kontenkelolabuku').innerHTML=response;
                },
                error: function(error){
                  console.log(error);
                }

              })
          },
          error: function(err){
            console.log(err);
          }
        })
      },
      error: function(err){
        console.log(err);
      }
    })
  })

  $(document).on('click', '#guambarcuk', function(e){
    document.getElementById('guambar').click();
  })

  $(document).on('click', '#panelselengkapnyamodesimplified', (e)=>{
    let kodetogel=/kodetogel=\"(\d+)\"/.exec(e.currentTarget.outerHTML)[1];
     $.ajax({
      type:'POST',
      url:'api.php',
      data:'selengkapnya_1=true&jurukunci='+kodetogel,
      success:function(res){
        document.getElementById('pencarian').style.display='';
        document.getElementById('kontenkelolabuku').innerHTML=res;
        sembunyi(document.getElementById('btnkuduhidden'));
        
        document.querySelectorAll('#kududihidden')[0].style.display='none';
        document.querySelectorAll('#kududihidden')[1].style.display='none';
        document.querySelectorAll('#kududihidden')[2].style.display='none';
        document.getElementById('panelkelolabukumode2').style.display='none';
        sembunyi(document.getElementById('pencarianmodesimplified'));
        tidaksembunyi(document.getElementById('panelkelolabuku'));
        tidaksembunyi(document.getElementById('kontenkelolabuku'));
        document.getElementById('paginasi').innerHTML='';
        awal=1;
      },
      error:function(err){
        console.log(err);
      }
    })
    
  })

  $(document).on('input', '#pencarianmodesimplified', (e)=>{
    $.ajax({
      type:'POST',
      url:'api.php',
      data:'querymodesimplified=true&query='+e.currentTarget.value,
      success:function(res){
        document.getElementById('panelkelolabukumode2').innerHTML=res;
        document.querySelectorAll('.modekelolabukumode2')[0].value='Mode 2';
      },
      error:function(err){
        console.log(err);
      }
    })
  })

  $(document).on('input', '.modekelolabukumode2', function(e){
    if(e.currentTarget.value=='Mode 2'){
      //alert('mode2');
    }
    if(e.currentTarget.value=='Mode 1'){
      $.ajax({
                type:'POST',
                data:'ifetch=1',
                url:'api.php',
                success: function(response){
                  modekelolabukurefresh();
                  tidaksembunyi(document.querySelectorAll('#pencarian')[0]);
                  sembunyi(document.querySelectorAll('#pencarianmodesimplified')[0]);
                  document.querySelectorAll('#panelkelolabukumode2')[0].style.display='none';
                  tidaksembunyi(document.getElementById('btnkuduhidden'));
                  
                  document.querySelectorAll('#panelkelolabuku')[0].style.display='';
                   document.querySelectorAll('#kududihidden')[0].style.display='';
                  document.querySelectorAll('#kududihidden')[1].style.display='';
                  document.querySelectorAll('#kududihidden')[2].style.display='';
                  awal=1;
                  document.querySelector('#paginasi').innerHTML='<nav aria-label="Page navigation example"><ul class="pagination justify-content-center"><li id="sebelum" class="page-item disabled"><a class="page-link" href="#" tabindex="-1">Previous</a></li><li id="indexpagination" class="page-item disabled"><a class="page-link" href="#">1</a></li><li  id="sesudah" class="page-item "><a class="page-link" href="#">Next</a></li></ul></nav>'
                  document.getElementById('kontenkelolabuku').innerHTML=response;
                },
                error: function(error){
                  console.log(error);
                }

              })
    }
  })

  $(document).on('input', '.modekelolabuku', (e)=>{
    //console.log(e.currentTarget.value);
    if(e.currentTarget.value=="Mode 2"){
      cilukba();
      $.ajax({
        type:'POST',
        url:'api.php',
        data:'loadmodekelolabuku2=true',
        success: function(res){
          document.getElementById('panelkelolabukumode2').innerHTML=res;
          document.getElementById('panelkelolabukumode2').style.display='';
         document.querySelectorAll('.modekelolabukumode2')[0].value='Mode 2';
         tidaksembunyi(document.querySelectorAll('#pencarianmodesimplified')[0]);
        },
        error: function(err){
          console.log(err);
        }
      })
    }
    if(e.currentTarget.value=="Mode 1"){
         $.ajax({
                type:'POST',
                data:'ifetch=1',
                url:'api.php',
                success: function(response){
                	tidaksembunyi(document.getElementById('btnkuduhidden'));
                	
                   document.querySelectorAll('#kududihidden')[0].style.display='';
                  document.querySelectorAll('#kududihidden')[1].style.display='';
                  document.querySelectorAll('#kududihidden')[2].style.display='';
                  awal=1;
                  document.querySelector('#paginasi').innerHTML='<nav aria-label="Page navigation example"><ul class="pagination justify-content-center"><li id="sebelum" class="page-item disabled"><a class="page-link" href="#" tabindex="-1">Previous</a></li><li id="indexpagination" class="page-item disabled"><a class="page-link" href="#">1</a></li><li  id="sesudah" class="page-item "><a class="page-link" href="#">Next</a></li></ul></nav>'
                  document.getElementById('kontenkelolabuku').innerHTML=response;
                },
                error: function(error){
                  console.log(error);
                }

              })
    }
  })

  $(document).on('click', '#kelolapinjaman', (e)=>{
    cilukba();
     sembunyi(document.querySelectorAll('#pencarianmodesimplified')[0]);
    document.querySelectorAll('#panelkelolapinjaman')[0].style.display='';
  })

  $(document).on('click', '#hapusketeranganbuku', function(e){
    var isi=document.querySelectorAll('#kontenkelolabuku')[0].outerHTML;
    var kodetogel=/kodetogel=\"(\d+)\"/.exec(isi)[1];
    $.ajax({
      type:'POST',
      url:'api.php',
      data:'deleteketeranganbuku=true&kodetogel='+kodetogel,
      success: function(res){
         $.ajax({
                type:'POST',
                data:'ifetch=1',
                url:'api.php',
                success: function(response){
                	tidaksembunyi(document.getElementById('btnkuduhidden'));
                	
                   document.querySelectorAll('#kududihidden')[0].style.display='';
                  document.querySelectorAll('#kududihidden')[1].style.display='';
                  document.querySelectorAll('#kududihidden')[2].style.display='';
                  document.querySelector('.modekelolabuku').value='Mode 1';
                  document.querySelectorAll('#pencarian')[0].style.display='';
                  awal=1;
                  document.querySelector('#paginasi').innerHTML='<nav aria-label="Page navigation example"><ul class="pagination justify-content-center"><li id="sebelum" class="page-item disabled"><a class="page-link" href="#" tabindex="-1">Previous</a></li><li id="indexpagination" class="page-item disabled"><a class="page-link" href="#">1</a></li><li  id="sesudah" class="page-item "><a class="page-link" href="#">Next</a></li></ul></nav>'
                  document.getElementById('kontenkelolabuku').innerHTML=response;
                },
                error: function(error){
                  console.log(error);
                }

              })
      },
      error: function(err){
        console.log(err);
      }
    })
  })

  $(document).on('click','#kembaliketeranganbuku', function(e){
     $.ajax({
                type:'POST',
                data:'ifetch=1',
                url:'api.php',
                success: function(response){
                	tidaksembunyi(document.getElementById('btnkuduhidden'));
                	
                   document.querySelectorAll('#kududihidden')[0].style.display='';
                  document.querySelectorAll('#kududihidden')[1].style.display='';
                  document.querySelectorAll('#kududihidden')[2].style.display='';
                  document.querySelector('.modekelolabuku').value='Mode 1';
                  document.querySelectorAll('#pencarian')[0].style.display='';
                  awal=1;
                  document.querySelector('#paginasi').innerHTML='<nav aria-label="Page navigation example"><ul class="pagination justify-content-center"><li id="sebelum" class="page-item disabled"><a class="page-link" href="#" tabindex="-1">Previous</a></li><li id="indexpagination" class="page-item disabled"><a class="page-link" href="#">1</a></li><li  id="sesudah" class="page-item "><a class="page-link" href="#">Next</a></li></ul></nav>'
                  document.getElementById('kontenkelolabuku').innerHTML=response;
                },
                error: function(error){
                  console.log(error);
                }

              })
  })

  $(document).on('click', '#ubahketeranganbuku', function(e){
    if(e.currentTarget.outerHTML.match('Ubah')){
    var a=document.querySelectorAll('#inputketeranganbuku');
    a.forEach(function(a,b){
      a.attributes.removeNamedItem('disabled');
    })
    e.currentTarget.outerHTML='<button id="ubahketeranganbuku" type="button" class="btn btn-success">Simpan</button>';
  }
  else{
    var togel=document.getElementById('kontenkelolabuku').outerHTML;
    var c=/kodetogel=\"(\d+)\"/.exec(togel)[1];
    var data=$('#formketeranganbuku').serialize();
    $.ajax({
      type:'POST',
      url:'api.php',
      data:data+'&updateketeranganbuku=true&nomortogel='+c,
      success: function(response){
                 $.ajax({
                type:'POST',
                data:'ifetch=1',
                url:'api.php',
                success: function(response){
                  document.querySelectorAll('.modekelolabuku')[0].value='Mode 1';
                  tidaksembunyi(document.getElementById('btnkuduhidden'));
                  
                   document.querySelectorAll('#kududihidden')[0].style.display='';
                  document.querySelectorAll('#kududihidden')[1].style.display='';
                  document.querySelectorAll('#kududihidden')[2].style.display='';
                  awal=1;
                  document.querySelector('#paginasi').innerHTML='<nav aria-label="Page navigation example"><ul class="pagination justify-content-center"><li id="sebelum" class="page-item disabled"><a class="page-link" href="#" tabindex="-1">Previous</a></li><li id="indexpagination" class="page-item disabled"><a class="page-link" href="#">1</a></li><li  id="sesudah" class="page-item "><a class="page-link" href="#">Next</a></li></ul></nav>'
                  document.getElementById('kontenkelolabuku').innerHTML=response;
                },
                error: function(error){
                  console.log(error);
                }

              })
      
      },
      error: function(err){
        console.log(err);
      }

    })
  }
  })

  $(document).on('click', '#selengkapnya_1', (r)=>{
    r.preventDefault();
    var jurukunci=/jurukunci="([^\"]+)/.exec(r.currentTarget.outerHTML)[1];
    $.ajax({
      type:'POST',
      url:'api.php',
      data:'selengkapnya_1=true&jurukunci='+jurukunci,
      success:function(res){
        document.getElementById('kontenkelolabuku').innerHTML=res;
        sembunyi(document.getElementById('btnkuduhidden'));
        
        document.querySelectorAll('#kududihidden')[0].style.display='none';
        document.querySelectorAll('#kududihidden')[1].style.display='none';
        document.querySelectorAll('#kududihidden')[2].style.display='none';
        document.getElementById('paginasi').innerHTML='';
        awal=1;
      },
      error:function(err){
        console.log(err);
      }
    })
  })

  $(document).on('click', '#btnprosesmodaltambahpengurus', function(eee){
    eee.preventDefault();
    var data=$('#formeditpengurus').serialize();
    var data=data+'&updatepengurustoshokan=true';
    $.ajax({
      url:'api.php',
      type:'POST',
      data:data,
      success: function(re){
        document.getElementById('modialya').innerHTML='';
          $.ajax({
          type:'POST',
            data:'pengurustoshokan=true',
            url:'api.php',
            success: function(response){
              document.querySelector('#kelolapengurustoshokan').innerHTML=response;
            },
            error: function(error){
              console.log(error);
            }
        })

      },
      error: function(err){
        console.log(err);
      }

    })

  })

  $(document).on('click', '#tambahpengurustoshokan', (e)=>{
    e.preventDefault();
    if(document.getElementsByName('nama1')[0].value.length==0){
      alert('Isikan dulu semua data');
    }
     else if(document.getElementsByName('email1')[0].value.length==0){
      alert('Isikan dulu semua data');
    }
     else if(document.getElementsByName('nickname1')[0].value.length==0){
      alert('Isikan dulu semua data');
    }
     else if(document.getElementsByName('password1')[0].value.length==0){
     alert('Isikan dulu semua data');
    }
    else if(!document.getElementsByName('email1')[0].value.match(/^[\w+\d+_\/\][\\]+@[\w\d.]+/)){
      alert('Tolong isikan format email yang benar')
    }
    else{
    var data=$('#formtambahpengurus').serialize();
    var data=data+'&tambahpengurustoshokan=true';
    $.ajax({
            type:'POST',
              data:data,
              url:'api.php',
              success: function(response){
                        $.ajax({
                        type:'POST',
                          data:'pengurustoshokan=true',
                          url:'api.php',
                          success: function(response){
                            document.querySelector('#kelolapengurustoshokan').innerHTML=response;
                          },
                          error: function(error){
                            console.log(error);
                          }
                      })
              },
              error: function(error){
                console.log(error);
              }
          })
      }
  })

  $(document).on('click', '#btnprosesmodaltambahanggota', (e)=>{
    var data=$('#formeditanggota').serialize();
    var data=data+'&autheditanggota=true';
    $.ajax({
      type:'POST',
      url:'api.php',
      data:data,
      success: function(res){
        document.getElementById('modialya').innerHTML='';
         $.ajax({
            type:'POST',
              data:'kelolaanggota=true',
              url:'api.php',
              success: function(response){
                document.querySelector('#kelolaanggotatoshokan').innerHTML=response;
              },
              error: function(error){
                console.log(error);
              }
          })
      },
      error: function(err){
        console.log(err);
      }
    })
  })

  $(document).on('click', '#tambahanggotatoshokan', function(event){
    event.preventDefault();
    if(document.getElementsByName('nama')[0].value.length==0){
      alert('Isikan dulu semua data');
    }
     else if(document.getElementsByName('email')[0].value.length==0){
      alert('Isikan dulu semua data');
    }
     else if(document.getElementsByName('notelp')[0].value.length==0){
     alert('Isikan dulu semua data');
    }
     else if(document.getElementsByName('namapanggilan')[0].value.length==0){
      alert('Isikan dulu semua data');
    }
     else if(document.getElementsByName('password')[0].value.length==0){
     alert('Isikan dulu semua data');
    }
    else if(!document.getElementsByName('email')[0].value.match(/^[\w+\d+_\/\][\\]+@[\w\d.]+/)){
      alert('Tolong isikan format email yang benar')
    }
    else{
      var data=$('#formtambahanggota').serialize();
      var data=data+'&tambahanggotatoshokan=true';
      $.ajax({
        type:'POST',
        url:'api.php',
        data: data,
        success: function(res){
             document.getElementById('hiddentambahanggotatoshokan').style.display='none';
              document.getElementById('tambahanggotatoshokanz').outerHTML='<button id="tambahanggotatoshokanz" type="button" class="btn btn-success" style="float:left;margin-bottom:18px;">Tambah Pengurus Toshokan</button>';
            $.ajax({
            type:'POST',
              data:'kelolaanggota=true',
              url:'api.php',
              success: function(response){
                document.querySelector('#kelolaanggotatoshokan').innerHTML=response;
                alert('Anggota telah ditambahkan');
              },
              error: function(error){
                console.log(error);
              }
          })
        },
        error: function(err){
          console.log(err);
        }
      })
    }
  })

  $(document).on('click', '#tambahpengurustoshokanz', function(e){
    if(e.currentTarget.outerHTML.match('Tambah')){
      document.getElementById('hiddentambahpengurustoshokan').style.display='';
      e.currentTarget.outerHTML='<button id="tambahpengurustoshokanz" type="button" class="btn btn-success" style="float:left;margin-bottom:18px;">Tutup</button>';
    }
    if(e.currentTarget.outerHTML.match('Tutup')){
      document.getElementById('hiddentambahpengurustoshokan').style.display='none';
      e.currentTarget.outerHTML='<button id="tambahpengurustoshokanz" type="button" class="btn btn-success" style="float:left;margin-bottom:18px;">Tambah Pengurus Toshokan</button>';
    }
  })

  $(document).on('click', '#tambahanggotatoshokanz', (e)=>{
    if(e.currentTarget.outerHTML.match('Tambah Anggota')){
      document.getElementById('hiddentambahanggotatoshokan').style.display='';
      e.currentTarget.outerHTML='<button id="tambahanggotatoshokanz" type="button" class="btn btn-success" style="float:left;margin-bottom:18px;">Tutup</button>';
    }
     if(e.currentTarget.outerHTML.match('Tutup')){
      document.getElementById('hiddentambahanggotatoshokan').style.display='none';
      e.currentTarget.outerHTML='<button id="tambahanggotatoshokanz" type="button" class="btn btn-success" style="float:left;margin-bottom:18px;">Tambah Anggota Toshokan</button>';
    }
  })

   $(document).on('click', '#btntutupmodaltambahpengurus', function(e){
    document.querySelector('#modialya').innerHTML='';
    document.querySelector('#modialya').style.display='none';
  })

  $(document).on('click', '#xtutupmodaltambahanggota', function(e){
    document.querySelector('#modialya').innerHTML='';
    document.querySelector('#modialya').style.display='none';
  })

  $(document).on('click', '#btntutupmodaltambahanggota', function(e){
    document.querySelector('#modialya').innerHTML='';
    document.querySelector('#modialya').style.display='none';
  })

	$(document).on('click', '#deletepengurustoshokan', function(e){
	var jurukunci=/jurukunci="([^\"]+)/.exec(e.currentTarget.outerHTML)[1];
	$.ajax({
      type:'POST',
        data:'deletepengurustoshokan=true&jurukunci='+jurukunci,
        url:'api.php',
        success: function(response){
                 $.ajax({
              type:'POST',
                data:'pengurustoshokan=true',
                url:'api.php',
                success: function(response){
                  document.querySelector('#kelolapengurustoshokan').innerHTML=response;
                },
                error: function(error){
                  console.log(error);
                }
            })
        },
        error: function(error){
          console.log(error);
        }
    })
	})

	$(document).on('click', '#ngeditpengurustoshokan', function(e){
		var jurukunci=/jurukunci="([^\"]+)/.exec(e.currentTarget.outerHTML)[1];
		 $.ajax({
      type:'POST',
        data:'ngeditpengurustoshokan=true&jurukunci='+jurukunci,
        url:'api.php',
        success: function(response){
          document.querySelector('#modialya').innerHTML=response;
          $('#modialya').fadeIn(500);
        },
        error: function(error){
          console.log(error);
        }
    })
	})


	$(document).on('click', '#deleteanggotatoshokan', function(e){
		var jurukunci=/jurukunci="([^\"]+)/.exec(e.currentTarget.outerHTML)[1];
		$.ajax({
      type:'POST',
        data:'deleteanggotatoshokan=true&jurukunci='+jurukunci,
        url:'api.php',
        success: function(response){
                    $.ajax({
                type:'POST',
                  data:'kelolaanggota=true',
                  url:'api.php',
                  success: function(response){
                    document.querySelector('#kelolaanggotatoshokan').innerHTML=response;
                  },
                  error: function(error){
                    console.log(error);
                  }
              })
        },
        error: function(error){
          console.log(error);
        }
    })
	})

	$(document).on('click', '#ngeditanggotatoshokan', function(e){
		var jurukunci=/jurukunci="([^\"]+)/.exec(e.currentTarget.outerHTML)[1];
		  $.ajax({
      type:'POST',
        data:'ngeditanggotatoshokan=true&jurukunci='+jurukunci,
        url:'api.php',
        success: function(response){
          document.querySelector('#modialya').innerHTML=response;
          $('#modialya').fadeIn(500);
        },
        error: function(error){
          console.log(error);
        }
    })
	})

	$(document).on('click', '#btnanggotatoshokan', function(e){
		$('#btnpengurustoshokan').removeClass('active');
		$('#btnanggotatoshokan').addClass('active');
		document.querySelector('#kelolapengurustoshokan').style.display='none';
		document.querySelector('#kelolaanggotatoshokan').style.display='';
		$.ajax({
			type:'POST',
    		data:'kelolaanggota=true',
    		url:'api.php',
    		success: function(response){
    			document.querySelector('#kelolaanggotatoshokan').innerHTML=response;
    		},
    		error: function(error){
    			console.log(error);
    		}
		})
	})	

	$(document).on('click', "#btnpengurustoshokan", (e)=>{
		$('#btnanggotatoshokan').removeClass('active');
		$('#btnpengurustoshokan').addClass('active');
		document.querySelector('#kelolaanggotatoshokan').style.display='none';
		document.querySelector('#kelolapengurustoshokan').style.display='';
		$.ajax({
			type:'POST',
    		data:'pengurustoshokan=true',
    		url:'api.php',
    		success: function(response){
    			document.querySelector('#kelolapengurustoshokan').innerHTML=response;
    		},
    		error: function(error){
    			console.log(error);
    		}
		})
	})
	
	$(document).on('click', '#kelolabuku', function(e){
		e.preventDefault();
		cilukba();
    sembunyi(document.querySelectorAll('#pencarianmodesimplified')[0]);
		document.querySelector('#pencarian').style.display='';
		document.querySelector('#panelkelolabuku').style.display='';
    document.querySelector('.modekelolabuku').value='Mode 1';
      $.ajax({
        type:'POST',
        data:'ifetch=1',
        url:'api.php',
        success: function(response){
        	tidaksembunyi(document.getElementById('btnkuduhidden'));
        	
           document.querySelectorAll('#kududihidden')[0].style.display='';
          document.querySelectorAll('#kududihidden')[1].style.display='';
          document.querySelectorAll('#kududihidden')[2].style.display='';
          awal=1;
          document.querySelector('#paginasi').innerHTML='<nav aria-label="Page navigation example"><ul class="pagination justify-content-center"><li id="sebelum" class="page-item disabled"><a class="page-link" href="#" tabindex="-1">Previous</a></li><li id="indexpagination" class="page-item disabled"><a class="page-link" href="#">1</a></li><li  id="sesudah" class="page-item "><a class="page-link" href="#">Next</a></li></ul></nav>'
          document.getElementById('kontenkelolabuku').innerHTML=response;
        },
        error: function(error){
          console.log(error);
        }

      })
      

	})

	$(document).on('click','#kelolaanggota', function(e){
		e.preventDefault();
		cilukba();
    sembunyi(document.querySelectorAll('#pencarianmodesimplified')[0]);
		document.querySelector('#panelkelolaanggota').style.display='';
		$.ajax({
			type:'POST',
    		data:'kelolaanggota=true',
    		url:'api.php',
    		success: function(response){
    			document.querySelector('#kelolaanggotatoshokan').innerHTML=response;
    		},
    		error: function(error){
    			console.log(error);
    		}
		})

	})
	$(document).on('click', '#indexpagination', function(e){
		e.preventDefault();
		awal=parseInt(e.currentTarget.innerText); 
		document.querySelectorAll('#indexpagination')[0].outerHTML='<li id="indexpagination" class="page-item disabled"><a class="page-link" href="#">'+awal+'</a></li>';
		if(e.currentTarget.outerHTML.match('disabled')){
			console.log('passing');
		}
		else if(awal!=1){
			document.querySelectorAll('#sebelum')[0].classList.remove('disabled');
		}

		//initial=e.currentTarget.innerText;
	})
	
	$(document).on('click', '#sebelum', function(e){
		e.preventDefault();
		if(document.querySelector('#sebelum').outerHTML.match('disabled')){
    		console.log('passing');
    	}
    	else{
    	var ifetch=document.querySelectorAll('#indexpagination')[0].innerText;
    	ifetch=ifetch-1;
    	$.ajax({
    		type:'POST',
    		data:'ifetch='+ifetch,
    		url:'api.php',
    		success: function(response){
    			document.getElementById('kontenkelolabuku').innerHTML=response;
    		},
    		error: function(error){
    			console.log(error);
    		}
    	})
    	}

		if(document.querySelector('#sesudah').outerHTML.match('disabled')){
			document.querySelector('#sesudah').classList.remove('disabled');
		}
    	if(awal==1){
    		document.querySelectorAll('#sebelum')[0].classList.add('disabled');
    	}
    	else{
    		awal=awal-1;
    	document.querySelectorAll('#indexpagination')[0].outerHTML='<li id="indexpagination" class="page-item disabled"><a class="page-link" href="#">'+awal+'</a></li>';
    		if(awal==1){
    		document.querySelectorAll('#sebelum')[0].classList.add('disabled');
    		}

    	}
    	
    })

    $(document).on('click', '#sesudah', function(e){
    	e.preventDefault();
    	if(e.currentTarget.outerHTML.match('disabled')){
    		console.log('passing');
    	}

    	else{
    		awal=awal+1;
    		document.querySelectorAll('#indexpagination')[0].outerHTML='<li id="indexpagination" class="page-item disabled"><a class="page-link" href="#">'+awal+'</a></li>';
    		var ifetch=document.querySelectorAll('#indexpagination')[0].innerText;
    		ifetch=ifetch;
    		$.ajax({
    		type:'POST',
    		data:'ifetch='+ifetch,
    		url:'api.php',
    		success: function(response){
    			document.getElementById('kontenkelolabuku').innerHTML=response;
    		},
    		error: function(error){
    			console.log(error);
    		}
    	})
    	}
    	if(awal!=1){
    		document.querySelectorAll('#sebelum')[0].classList.remove('disabled');
    	}
    	if(awal==peaklimit){
    		document.querySelectorAll('#sesudah')[0].classList.add('disabled');
    	}

    })

    $(document).on('input','#pencarian', function(e){
   		var value=e.currentTarget.value;
   		if(value.length==0){
   			$.ajax({
    		type:'POST',
    		data:'ifetch=1',
    		url:'api.php',
    		success: function(response){
          awal=1;
          tidaksembunyi(document.getElementById('btnkuduhidden'));
          
          document.querySelectorAll('#kududihidden')[0].style.display='';
          document.querySelectorAll('#kududihidden')[1].style.display='';
          document.querySelectorAll('#kududihidden')[2].style.display='';
    			document.getElementById('kontenkelolabuku').innerHTML=response;
    		},
    		error: function(error){
    			console.log(error);
    		}

    	})
   			document.querySelector('#paginasi').innerHTML='<nav aria-label="Page navigation example"><ul class="pagination justify-content-center"><li id="sebelum" class="page-item disabled"><a class="page-link" href="#" tabindex="-1">Previous</a></li><li id="indexpagination" class="page-item disabled"><a class="page-link" href="#">1</a></li><li  id="sesudah" class="page-item "><a class="page-link" href="#">Next</a></li></ul></nav>'
   			document.querySelector('#paginasi').style.display='';
   		}
   		else{
   			$.ajax({
    		type:'POST',
    		data:'search='+value,
    		url:'api.php',
    		success: function(response){
    	  sembunyi(document.getElementById('btnkuduhidden'));

          document.querySelectorAll('#kududihidden')[2].style.display='none';
          document.querySelectorAll('#kududihidden')[0].style.display='';
          document.querySelectorAll('#kududihidden')[1].style.display='';
    			document.getElementById('kontenkelolabuku').innerHTML=response;
    		},
    		error: function(error){
    			console.log(error);
    		}


    	})
		document.querySelector('#paginasi').style.display='none';
	}    
    })
		
	</script>
</body>

</html>