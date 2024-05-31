<!-- Header -->
<?php 
  $judul = "H O M E";
  include "templates/templates.php";  
?>
<!--body -->
<div class="container">
  <div class="row my-2 ">
    <div class="col-10">
      <div class="jumbotron p-3 m-0">
        <h1 class="display-5">Selamat Datang <?= $nama; ?></h1>
        <p class="jumbotron-body">di Aplikasi WEB RPS eyyo</p>
        <hr>
        <p class="jumbotron-footter">WEB RPS <?= date('Y'); ?></p>
      </div>
    </div>
  </div>
</div>

<!-- Footer -->
<?php include "templates/footer.php";?>
