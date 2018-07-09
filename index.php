<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Toshokan v1.0.0</title>
  <style type="text/css">
    /* The alert message box */
.alert {
    padding: 20px;
    width: 310px;
    margin-left: 13px;
    background-color: #f44336; /* Red */
    color: white;
    margin-bottom: 15px;
}

/* The close button */
.closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
}

/* When moving the mouse over the close button */
.closebtn:hover {
    color: black;
}

  </style>
<link rel="stylesheet" href="css/login.css">
  <style>
  body{
    background-color: #5f27cd;
    font-size: 16px;
  }

.page__demo{
  box-sizing: border-box;
  width: 100%;
  max-width: 640px;
  padding: 20px;
}

.page__hint{
  display: block;
  max-width: 26rem;
  line-height: 1.678;
  
  margin-left: auto;
  margin-right: auto;
  margin-top: 3rem;
  
  color: #fff;
  text-align: center;
}

</style>
  
  <link rel='stylesheet prefetch' href='https://codepen.io/melnik909/pen/ZxpozV.css'>
<link rel='stylesheet prefetch' href='https://codepen.io/melnik909/pen/LdRmEV.css'>

      <link rel="stylesheet" href="css/prototype.css">

  
</head>

<body style="background-color: #1c2e36;"> 
  <div class="page">

  <div class="page__demo">
    <div style="margin-left: 30px;">
    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
   width="512px" height="212px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
<path style="fill:#fffffff2;" d="M464,64v416H80c-17.672,0-32-14.313-32-32s14.328-32,32-32h352V0H80C44.656,0,16,28.656,16,64v384c0,35.344,28.656,64,64,64
  h416V64H464z"/>
</svg>
</div>
<h1 style="text-align: center;margin-left: -20px;color: #fffffff2">Toshokan <label style="font-size: 20px">v1.0.0</label></h1>

    <form class="search">
      <div class="a-field search__field">
        <input id="querypencarian" style="background-color: #1c2e36;" autocomplete="off" type="text" id="query" class="r-text-field a-field__input search__input" placeholder="Contoh: Ayat Ayat Cinta II" >
        <button class="r-button search__button search__clear" type="reset">
          <span class="search__clear-label">Hapus isi pencarian</span>
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 47.971 47.971" class="search__icon search__icon-clear">
            <path d="M28.228 23.986L47.092 5.122a2.998 2.998 0 0 0 0-4.242 2.998 2.998 0 0 0-4.242 0L23.986 19.744 5.121.88a2.998 2.998 0 0 0-4.242 0 2.998 2.998 0 0 0 0 4.242l18.865 18.864L.879 42.85a2.998 2.998 0 1 0 4.242 4.241l18.865-18.864L42.85 47.091c.586.586 1.354.879 2.121.879s1.535-.293 2.121-.879a2.998 2.998 0 0 0 0-4.242L28.228 23.986z"/>
          </svg>          
        </button>
        <label class="a-field__label-wrap search__hint" for="query">
          <span class="a-field__label">Literasi apa yang sedang kamu cari?</span>
        </label>        
      </div>
      <button class="r-button search__button search__submit" type="submit">
        <span class="search__submit-label">Cari</span>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 56.966 56.966" class="search__icon search__icon-search">
          <path d="M55.146 51.887L41.588 37.786A22.926 22.926 0 0 0 46.984 23c0-12.682-10.318-23-23-23s-23 10.318-23 23 10.318 23 23 23c4.761 0 9.298-1.436 13.177-4.162l13.661 14.208c.571.593 1.339.92 2.162.92.779 0 1.518-.297 2.079-.837a3.004 3.004 0 0 0 .083-4.242zM23.984 6c9.374 0 17 7.626 17 17s-7.626 17-17 17-17-7.626-17-17 7.626-17 17-17z"/>
        </svg>
      </button>
    </form>
     <div id="hasilsearch" class="a-field search__field" style="display:none;height: auto;word-wrap: break-word;max-width: 594px;width: 594px; z-index: -2;margin-top: -20px;border-width: 3px; background-color: white;border-color: #fffffff2;border-style: solid;">
      <table id="isipencarian" style="margin-top: 23px;margin-left: 10px;width: 570px">
      <img id="imej" src="https://www.cheshirefarmmachinery.co.uk/img/loading.gif" style="height: 210px;margin-left: 187px;margin-top: 35px">

      </table>
        

     </div>
   </div>

   

  <div class="login" style="display: none;">
  <div class="login-triangle" style="border-bottom-color: #29404a;"></div>
  
  <h2 class="login-header" style="background-color: #29404a">Log in</h2>

  <form class="login-container">
    <div class="alert" style="display: none">

</div>
    <p><input name="email" type="email" placeholder="Email"></p>
    <p><input name="password" type="password" placeholder="Password"></p>
    <p><input id="logsubmit" style="background-color: #29404a" type="submit" value="Log in"></p>
  </form>
</div>
  

</body>
 <script src="jquery.min.js"></script>
<script type="text/javascript">
  $(document).on('click', '.closebtn', (e)=>{
    document.querySelectorAll('.alert')[0].style.display='none';
  })
  $(document).on('click', '#logsubmit', (e)=>{
    e.preventDefault();
    let data=$('.login-container').serialize();
    $.ajax({
      url:'api.php',
      type:'POST',
      data:data+'&loginform=true',
      success: function(res){
        if(res.match('tidakditemukan')){
           document.querySelectorAll('.alert')[0].style.display='';
          document.querySelectorAll('.alert')[0].innerHTML='<span class="closebtn" onclick="this.parentElement.style.display="none";">&times;</span> Email Tidak Terdaftar.';
        }
        if(res.match('passwordsalah')){
          document.querySelectorAll('.alert')[0].style.display='';
          document.querySelectorAll('.alert')[0].innerHTML='<span class="closebtn" onclick="this.parentElement.style.display="none";">&times;</span> Password Salah.';
        }
        if(res.match('sukses')){
          location.href='admin.php';
        }
      },
      error: function(err){
        console.log(err);
      }
    })
  })

  $(document).on('click', '#Layer_1', function(e){
    document.querySelectorAll('.login')[0].style.display='';
    document.querySelectorAll('.page__demo')[0].style.display='none';
    $.ajax({
      url:'api.php',
      type:'POST',
      data:'ngeceksesi=true',
      success: function(tes){
        if(tes.match('adminadasesi')){
          location.href='admin.php';
        }
      },
      error: function(err){
        console.log(err);
      }
    })
  })

  $(document).on('click', '.search__clear', function(e){
  document.querySelectorAll('#hasilsearch')[0].style.display='none';
  document.querySelectorAll('#imej').style.display='';
})

$(document).on('click', '.search__icon-clear', function(e){
  document.querySelectorAll('#hasilsearch')[0].style.display='none';
  document.querySelectorAll('#imej').style.display='';
})

$(document).on('input','#querypencarian', (e)=>{
  document.querySelectorAll('#hasilsearch')[0].style.display='';
  console.log(e.currentTarget.value.length);
  if(e.currentTarget.value.length>0){
     $.ajax({
    url:'api.php',
    type:'POST',
    data:'querypencarianindex=true&query='+e.currentTarget.value,
    success: function(res){
      document.querySelectorAll('#imej')[0].style.display='none';
      document.querySelectorAll('#isipencarian')[0].innerHTML=res;
    },
    error: function(err){
      console.log(err);
    }
  })
  }
  if(e.currentTarget.value.length==0){
    document.querySelectorAll('#hasilsearch')[0].style.display='none';
    document.querySelectorAll('#imej').style.display='';
  }
 
})

</script>

</html>
