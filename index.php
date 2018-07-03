<?php
$title='Toshokan v1.0.0';
$tanggal=date('d/m/Y');
?>
<html lang="en"><head>
  <meta charset="UTF-8">
  <title>Admin Page Layout</title>
  <script src="https://cdn.linearicons.com/free/1.0.0/svgembedder.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Poppins:400,600" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>

<body>

  <div class="sidebar">
  
  <div class="sidebar__subsections">
    <div class="sidebar__subsections-brand"><?php echo $title;?></div>
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
      Halo, Admin <svg class="lnr lnr-cog icon"><use xlink:href="#lnr-cog"></use></svg>
    </div>
  </div>
  
  <div class="content">
    
    <div class="content__main">

         <div id="panelkelolabukumode2" class="content__main-page" style="display: none">
        <hr id="kududihiddenmode2">
        <h1 id="kududihiddenmode2">Kelola Buku - Simplified</h1>
        <hr>
        <select id="kududihiddenmode2" class="form-control modekelolabukumode2" style="width: 100px;float: right;margin-top:-67px;">
  <option>Mode 1</option>
  <option>Mode 2</option>
</select>

      </div>

       <div id="panelkelolapinjaman" class="content__main-page" style="display: none">
        <h1>NGENTOOODD</h1>
      </div>

      <div id="panelkelolabuku" class="content__main-page">
      	<hr id="kududihidden">
      	<h1 id="kududihidden">Kelola Buku</h1>
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
		    <p class="card-text">'.$konten['penjelasan'].'</p>
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
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

  $(document).on('input', '#pencarianmodesimplified', (e)=>{
    console.log(e.currentTarget.value);
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
      document.getElementById('panelkelolabukumode2').style.display='';
      document.querySelectorAll('.modekelolabukumode2')[0].value='Mode 2';
      tidaksembunyi(document.querySelectorAll('#pencarianmodesimplified')[0]);
    }
    if(e.currentTarget.value=="Mode 1"){
         $.ajax({
                type:'POST',
                data:'ifetch=1',
                url:'api.php',
                success: function(response){
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
        console.log(res);
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