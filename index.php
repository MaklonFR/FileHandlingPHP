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
 <h3 class="text-center">FIle Handling System</h3>
 </div>
 
 <?php
 /* CEK NILAI CEK ADA ATAU KOSONG? */
 if ( isset($_GET['cek']) !=null ) {
     $cek = $_GET["cek"];
    /* CEK NILAI CEK = sukses_hapus */
    if ($cek == "sukses_hapus"){
    echo'
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Berhasil dihapus!</strong> Anda baru saja menghapus data file. Silahkan dicek!.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
     } 
     /* CEK NILAI CEK = sukses_simpan */
     elseif($_GET['cek']=='sukses_simpan'){
    echo'
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Berhasil disimpan!</strong> Anda baru saja menambah data file. Silahkan dicek!.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
      } 
      /* CEK NILAI CEK = sukses_ubah */
      elseif($_GET['cek']=='sukses_ubah') {
    echo'
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Berhasil diubah!</strong> Anda baru saja mengubah data file. Silahkan dicek!.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
      }
}
?>
 <!-- SIMPAN DATA DENGAN METODE $_POST-->
 <?php
if(isset($_POST['submit'])) {
	
	//random filename
	$r_number = rand(1000000000, 0000);
	//get current date
	$date = date('Ymy');
	$filename = $date."_".$r_number;
		
	$data 	= $_POST['nama'];
	$address= $_POST['al'];
	$lk 		= $_POST['lokasi'];
	$tgl 		= $_POST['tgl'];
	$wkt 		= $_POST['wkt'];
	$st 		= $_POST['st'];

	if(empty($data) && empty($address)&& empty($lk)&& empty($tgl)&& empty($wkt)&& empty($st)) {
		echo "<font color='red'>All fields are required. Please check.</font>";
	}elseif(empty($data)) { 
		echo "<font color='red'>This field is required.</font>";
	}elseif(empty($address)) { 
		echo "<font color='red'>This field is required.</font>";
	}else {
		//path to save txt file
		$myFile = "name/files_$filename.txt";
		$fh = fopen($myFile, 'w') or die("can't open file");
		fwrite($fh, $data);	
		
		$myFile = "address/files_$filename.txt";
		$fh1 = fopen($myFile, 'w') or die("can't open file");
		fwrite($fh1, $address);	
		fclose ($fh1);

		$myFile = "lokasi/files_$filename.txt";
		$fh1 = fopen($myFile, 'w') or die("can't open file");
		fwrite($fh1, $lk);	
		fclose ($fh1);

		$myFile = "tanggal/files_$filename.txt";
		$fh1 = fopen($myFile, 'w') or die("can't open file");
		fwrite($fh1, $tgl);	
		fclose ($fh1);

		$myFile = "waktu/files_$filename.txt";
		$fh1 = fopen($myFile, 'w') or die("can't open file");
		fwrite($fh1, $wkt);	
		fclose ($fh1);

		$myFile = "suhu_tubuh/files_$filename.txt";
		$fh1 = fopen($myFile, 'w') or die("can't open file");
		fwrite($fh1, $st);	
		fclose ($fh1);
		
	}	
}
?>
 <div class="row">
  <div class="col-md-4">
    <form action="index.php?cek=sukses_simpan" method="post" enctype="multipart/form-data">
      <div class="input-group mb-2">
        <span class="input-group-text" id="basic-addon1">N</span>
        <input type="text" class="form-control" placeholder="Nama Lengkap" 
        name="nama" aria-label="nama" aria-describedby="basic-addon1">
      </div>
      <div class="input-group mb-2">
        <span class="input-group-text" id="basic-addon1">A</span>
        <input type="text" class="form-control" placeholder="Alamat"name="al"
        aria-label="al" aria-describedby="basic-addon1">
      </div>
      <div class="input-group mb-2">
        <span class="input-group-text" id="basic-addon1">L</span>
        <input type="text" class="form-control" placeholder="Lokasi Tujuan" 
        name="lokasi" aria-label="lokasi" aria-describedby="basic-addon1">
      </div>
      <div class="input-group mb-2">
        <span class="input-group-text" id="basic-addon1">T</span>
        <input type="date" class="form-control" placeholder="Tanggal"
        name="tgl" aria-label="tgl" aria-describedby="basic-addon1">
      </div>
      <div class="input-group mb-2">
        <span class="input-group-text" id="basic-addon1">J</span>
        <input type="time" class="form-control" placeholder="Waktu"
        name="wkt" aria-label="wkt" aria-describedby="basic-addon1">
      </div>
      <div class="input-group mb-2">
        <span class="input-group-text" id="basic-addon1">T</span>
        <input type="text" class="form-control" placeholder="Suhu Tubuh"
        name="st" aria-label="st" aria-describedby="basic-addon1">
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
      <button type="reset"  name="clear" class="btn btn-warning">Batal</button>
    </form>
   </div>

   <div class="col-md-8">
       <div class="col align-self-end col-4">
           <div class="input-group mb-2">
           <span class="input-group-text" id="basic-addon1">P</span>
           <input type="text" name="cari" class="form-control" placeholder="Pencarian"
           id="cari" aria-label="cari" aria-describedby="basic-addon1">
           </div>
       </div>
       
     <div class="table-responsive">
        <table class="table table-success table-striped">
            <thead>
                <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Lokasi</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Waktu</th>
                    <th scope="col">Suhu Tubuh</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
               <?php
                $path = 'name/'; 
               		foreach (new DirectoryIterator($path) as $file)
                   {
                     if($file->isDot()) continue;
                     if($file->isFile())
                     {
                       echo "<tr class='data-row'>";
                       echo "<td>".file_get_contents('name/'.$file)."</td>
                             <td>".file_get_contents('address/'.$file)."</td>
                           <td>".file_get_contents('lokasi/'.$file)."</td>
                           <td>".file_get_contents('tanggal/'.$file)."</td>
                           <td>".file_get_contents('waktu/'.$file)."</td>
                           <td>".file_get_contents('suhu_tubuh/'.$file)."</td>
                           <td>
                           <a href='ubah.php?filename=$file'>
                            <span class='badge bg-primary'>Ubah</span>
                           </a>
                           <a href='delete.php?filename=$file'>
                            <span class='badge bg-danger'>Hapus</span>
                           </a>
                           </td>";
                       echo "</tr>";
                     }
                   }
               ?>
            </tbody>
        </table>
      </div>
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
        <script type="text/javascript">
</script>
<script src="jquery.min.js"></script>

<script>
$(document).ready(function(){  
  $('input[name="cari"]').keyup(function(){ 
      var searchterm = $(this).val();

    if(searchterm.length >2) {
      var match = $('tr.data-row:contains("' + searchterm + '")');
      var nomatch = $('tr.data-row:not(:contains("' + searchterm + '"))');				
      match.addClass('selected');
      nomatch.css("display", "none");
    } else {
      $('tr.data-row').css("display", "");
      $('tr.data-row').removeClass('selected');				
    }
    
  });

});	
</script>

</body>
</html>