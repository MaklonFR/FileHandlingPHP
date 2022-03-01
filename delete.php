 
<!-- DELETE DATA DENGAN METODE $_POST-->
<?php 
$get_filename = $_GET['filename'];
//echo $get_filename;

if(isset($_POST['Submit'])){

	$filename =$_POST['filename'];
	unlink('name/'.$filename);
	unlink('address/'.$filename);
	unlink('lokasi/'.$filename);
	unlink('tanggal/'.$filename);
	unlink('waktu/'.$filename);
	unlink('suhu_tubuh/'.$filename);
	
	echo "<script>window: location='index.php?cek=sukses_hapus'</script>";
	
}elseif(isset($_POST['Cancel'])) {
	echo "<script>window: location='index.php'</script>";
}
$e_nama = file("name/$get_filename");
$e_al = file("address/$get_filename");
$e_lk = file("lokasi/$get_filename");
$e_tgl = file("tanggal/$get_filename");
$e_wkt = file("waktu/$get_filename");
$e_st = file("suhu_tubuh/$get_filename");
?>

<!DOCTYPE html>
<html lang="en" class="">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>File Handling</title>
  <link href="bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
 <h3 class="text-center">Halaman Delete</h3>
 </div>

 <div class="row">
    <div class="col-md-3">
      
    </div>
  <div class="col-md-6">
    <form action="delete.php" method="post">
    <input type="hidden" name="filename" value="<?=$get_filename?>">
      <div class="input-group mb-2">
        <span class="input-group-text" id="basic-addon1">N</span>
        <input type="text" class="form-control" placeholder="Nama Lengkap" disabled 
        name="e_nama" aria-label="e_nama" aria-describedby="basic-addon1"
        value="<?php foreach($e_nama as $fullname_text) { echo $fullname_text; } ?>">
      </div>
      <div class="input-group mb-2">
        <span class="input-group-text" id="basic-addon1">A</span>
        <input type="text" class="form-control" placeholder="Alamat"name="e_al" disabled
        aria-label="e_al" aria-describedby="basic-addon1"
        value="<?php foreach($e_al as $fullname_text) { echo $fullname_text; } ?>">
      </div>
      <div class="input-group mb-2">
        <span class="input-group-text" id="basic-addon1">L</span>
        <input type="text" class="form-control" placeholder="Lokasi Tujuan" disabled
        name="e_lk" aria-label="e_lk" aria-describedby="basic-addon1"
        value="<?php foreach($e_lk as $fullname_text) { echo $fullname_text; } ?>">
      </div>
      <div class="input-group mb-2">
        <span class="input-group-text" id="basic-addon1">T</span>
        <input type="date" class="form-control" placeholder="Tanggal" disabled
        name="e_tgl" aria-label="e_tgl" aria-describedby="basic-addon1"
        value="<?php foreach($e_tgl as $fullname_text) { echo $fullname_text; } ?>">
      </div>
      <div class="input-group mb-2">
        <span class="input-group-text" id="basic-addon1">J</span>
        <input type="text" class="form-control" placeholder="Waktu" disabled
        name="e_wkt" aria-label="e_wkt" aria-describedby="basic-addon1"
        value="<?php foreach($e_tgl as $fullname_text) { echo $fullname_text; } ?>">
      </div>
      <div class="input-group mb-2">
        <span class="input-group-text" id="basic-addon1">T</span>
        <input type="text" class="form-control" placeholder="Suhu Tubuh (Celsius)" disabled
        name="e_st" aria-label="e_st" aria-describedby="basic-addon1"
        value="<?php foreach($e_st as $fullname_text) { echo $fullname_text; } ?>">
      </div>
      <button type="submit" name="Submit"  class="btn btn-danger">Hapus</button>
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

<script src="bootstrap.bundle.min.js" 
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>