<!DOCTYPE html>
<html lang="en" class="">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>File Handling</title>
  <link href="bootstrap.min.css" rel="stylesheet" >
 <link rel="icon" type="image/x-icon" href="home.png">
</head>
<body>
<div class="container-fluid mt-4">
   <ul class="nav">
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="index.php">HOME</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">OLAH DATA</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">CATATAN</a>
    </li>
   </ul>
</div>

<div class="container-fluid mt-4">
 <div class="mb-4">
 <h3 class="text-center">Halaman Update</h3>
 </div>
 
<!-- UBAH DATA DENGAN METODE $_POST-->
 <?php 
$get_filename = $_GET['filename'];

if(isset($_POST['Submit'])){

$edit_name = fopen("name/$get_filename","w+");
$fullname_text = $_POST['e_nama'];

$edit_address = fopen("address/$get_filename","w+");
$address_text = $_POST['e_al'];

$edit_lk = fopen("lokasi/$get_filename","w+");
$lk_text = $_POST['e_lk'];

$edit_tgl = fopen("tanggal/$get_filename","w+");
$tgl_text = $_POST['e_tgl'];

$edit_wkt = fopen("waktu/$get_filename","w+");
$wkt_text = $_POST['e_wkt'];

$edit_st = fopen("suhu_tubuh/$get_filename","w+");
$st_text = $_POST['e_st'];


if(fwrite($edit_name, $fullname_text) && fwrite($edit_address, $address_text) && 
   fwrite($edit_lk, $lk_text) && fwrite($edit_tgl, $tgl_text) && fwrite($edit_wkt, $wkt_text) &&
   fwrite($edit_st, $st_text) ) {
	echo "<script>window: location='index.php?cek=sukses_ubah'</script>";
}

fclose($open);

}elseif(isset($_POST['Cancel'])) {
	echo "<script>window: location='index.php'</script>";
}
$fullname   = file("name/$get_filename");
$address    = file("address/$get_filename");
$lk         = file("lokasi/$get_filename");
$tgl        = file("tanggal/$get_filename");
$wkt        = file("waktu/$get_filename");
$st         = file("suhu_tubuh/$get_filename");
?>

 <div class="row">
    <div class="col-md-3">
      
    </div>
  <div class="col-md-6">
    <form action="ubah.php?filename=<?=$get_filename;?>" method="post" enctype="multipart/form-data">
      <div class="input-group mb-2">
        <span class="input-group-text" id="basic-addon1">N</span>
        <input type="text" class="form-control" placeholder="Nama Lengkap" 
        name="e_nama" aria-label="e_nama" aria-describedby="basic-addon1"
        value="<?php foreach($fullname as $fullname_text) { echo $fullname_text; } ?>">
      </div>
      <div class="input-group mb-2">
        <span class="input-group-text" id="basic-addon1">A</span>
        <input type="text" class="form-control" placeholder="Alamat"name="e_al"
        aria-label="e_al" aria-describedby="basic-addon1"
        value="<?php foreach($address as $fullname_text) { echo $fullname_text; } ?>">
      </div>
      <div class="input-group mb-2">
        <span class="input-group-text" id="basic-addon1">L</span>
        <input type="text" class="form-control" placeholder="Lokasi Tujuan" 
        name="e_lk" aria-label="e_lk" aria-describedby="basic-addon1"
        value="<?php foreach($lk as $fullname_text) { echo $fullname_text; } ?>">
      </div>
      <div class="input-group mb-2">
        <span class="input-group-text" id="basic-addon1">T</span>
        <input type="date" class="form-control" placeholder="Tanggal"
        name="e_tgl" aria-label="e_tgl" aria-describedby="basic-addon1"
        value="<?php foreach($tgl as $fullname_text) { echo $fullname_text; } ?>">
      </div>
      <div class="input-group mb-2">
        <span class="input-group-text" id="basic-addon1">J</span>
        <input type="time" class="form-control" placeholder="Waktu"
        name="e_wkt" aria-label="e_wkt" aria-describedby="basic-addon1"
        value="<?php foreach($wkt as $fullname_text) { echo $fullname_text; } ?>">
      </div>
      <div class="input-group mb-2">
        <span class="input-group-text" id="basic-addon1">T</span>
        <input type="text" class="form-control" placeholder="Suhu Tubuh (Celsius)"
        name="e_st" aria-label="e_st" aria-describedby="basic-addon1"
        value="<?php foreach($st as $fullname_text) { echo $fullname_text; } ?>">
      </div>
      <button type="submit" name="Submit"  class="btn btn-primary">Ubah</button>
      <button type="submit" name="Cancel"  class="btn btn-warning">Batal</button>
    </form>
   </div>

   <div class="col-md-3">
      
   </div>

  </div>
  
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <div class="col-md-4 d-flex align-items-center">
      <span class="text-muted">
      <script>document.write(new Date().getFullYear())</script> © Programming Maklon</h6>
      </span>
    </div>
  </footer>

</div>

<script src="bootstrap.bundle.min.js"> </script>
</body>
</html>