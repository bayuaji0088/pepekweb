<?php
include 'koneksi.php';
$id = $_GET["id"];
$query="select * from tb_suplier where kode_sup= '$id'";

if(mysqli_query($con,$query)){
  $result=mysqli_query($con,$query);
}else die("error".mysqli_error());


  while($row=mysqli_fetch_assoc($result)){

?>

<?php
session_start();
if($_SESSION['status']!='login'){
  header('location:login.php');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Toko Komputerku</title>
    <Link rel="stylesheet" type="text/css" href="barang.css">
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>
<body>

<div class="sidenav">
<p class="text-white" style="font-size:20px; text-color:white;">TOKO KOMPUTERku</p>
<hr style="border-color: white;">
    <div class="btn-group" style="width: 100%; margin-bottom:5px;">
    <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown">
        Master &nbsp
      </button>
      <div class="dropdown-menu">
      <a class="dropdown-item" style="color:black;" href="barang.php">barang</a>
        <a class="dropdown-item" style="color:black;" href="karyawan.php">karyawan</a>
        <a class="dropdown-item" style="color:black;" href="suplier.php">suplier</a>
      </div>  
    </div>

    <div class="btn-group" style="width: 100%; margin-bottom:5px;">
    <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown">
        Transaksi &nbsp
      </button>
      <div class="dropdown-menu">
      <a class="dropdown-item" style="color:black;" href="Penjualan.php">Penjualan</a>
        <a class="dropdown-item" style="color:black;" href="pembelian.php">Pembelian</a>
      </div>  
    </div>

    <div class="btn-group" style="width: 100%; margin-bottom:5px;">
    <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown">
        Laporan &nbsp
      </button>
      <div class="dropdown-menu">
      <a class="dropdown-item" style="color:black;" href="laporanstok.php">Stok</a>
      <a class="dropdown-item" style="color:black;" href="laporanPenjualan.php">Penjualan</a>
      <a class="dropdown-item" style="color:black;" href="laporanpembelian.php">Pembelian</a>
      </div>  
    </div>

    <div>
    <a href="logout.php" style="position: fixed;bottom: 0px; margin-left: 17px;"><button class="btn btn-danger">LOGOUT</button></a>
  </div>
</div>
    
<div class="main">
    <div class="col-sm-12">
    <table class="table table-striped table-bordered">
    <thead class="thead-dark">

    <thead class="thead-dark">
    <p style="font-size:50px; text-align:center;">Edit Suplier</p>
    <tr>
      
   </tr>
    <form method = "post">
    <div class="form-grup">
    <label>kode suplier</label>
    <input type="text" name="kode_sup" value="<?php echo $row["kode_sup"]?>" class="form-control" id="exampleFormControlInput1" value="Karyo">
    <label>Nama Suplier</label>
    <input type="text" name="nama_sup" value="<?php echo $row["nama_sup"]?>" class="form-control" id="exampleFormControlInput1" value="Karyo">
    <label>No. Telp</label>
    <input type="text" name="no_telp" value="<?php echo $row["no_telp"]?>" class="form-control" id="exampleFormControlInput1" value="08222222222">
    <label>kota</label>
    <input type="text" name="kota" value="<?php echo $row["kota"]?>" class="form-control" id="exampleFormControlInput1" value="Karyo">
    <label>Nama Perusahaan</label>
    <input type="text" name="nama_per" value="<?php echo $row["nama_per"]?>" class="form-control" id="exampleFormControlInput1" value="PT. Logitech indonesia">
    <label>keterangan</label>
    <input type="text" name="ket" value="<?php echo $row["ket"]?>" class="form-control" id="exampleFormControlInput1" value="Karyo">    
    <br>
    <button type="submit" name="kirim" class="btn btn-danger">Simpan</button>
  </div>
    </form>
</div>
</div>
</body>
</html>

<?php
    
  }
 
  if(isset($_POST["kirim"])){

    $kode_sup=$_POST["kode_sup"];
    $nama_sup=$_POST["nama_sup"];
    $no_telp=$_POST["no_telp"];
    $kota=$_POST["kota"];
    $nama_per=$_POST["nama_per"];
    $keterangan=$_POST["ket"];

    $sql="UPDATE tb_suplier set nama_sup='$nama_sup',no_telp='$no_telp',kota='$kota',nama_per='$nama_per',ket='$keterangan' where kode_sup= '$kode_sup'";
    if(mysqli_query($con,$sql)){
      echo "berhasil diinputkan";
      header('Location: suplier.php');
    }else{
      echo "gagal diinputkan".mysqli_error($con);
    }
    
    
    }
  ?>