<?php
require 'function.php';
?>

<html>
<title>
2000018240 
</title>
<style>
  body{
    margin:0;
    font-family: arial, Helvatica, sans-serif;
    background-color: ghostwhite;
  }

  .head{
    background-color: dimgrey;
    height : 10%;
    font-size: 1.4vw;
  }

  .pilihan{
    background-color:darkgrey;
    height :130px;
    padding : 3px;
  }

  .barsamping{
    width : 25%;
    background-color:gray;
    padding : 5px;
    padding-top: 20px;
    height: 600px;
    float:left;
  }
    .isi{
    width : 90%;
    height : 50%;
    font-size: 20px;
    float: inherit;
    text-align: justify;

  }
  #menu{
    font-size: 25px;
    background-color: silver
  }
  #menu:hover{
    background-color: darkslategrey;
    font-size: 25px;
  }
  #tulisan{
    color:black;
  }
  #tulisan:hover{
    color:red;
  }
  .footer{
    margin-top: 40px;
    height:3vw;
    padding:25px;
    background-color:dimgrey;
    font-size: 2vw;
    clear: both;
  } 
  .tabel{
  width: 1000px;
  border-collapse: collapse;
  border: 2px solid black;
  text-align: center;
  }
  table,tr,td
</style>
<head>
</head>
<body>
<div class="head">
 <center><h1 style="color:azure;padding-top: 10px;">Website Responsi HQ.HAN</h1></center>
</div>

<div class="pilihan"><center>
    <h2 style="border: 4px solid grey;background-image: linear-gradient(to left, dimgrey, lightgrey);color:#696970"><marquee direction="left" scrollamount="16">Selamat Datang, website ini dibuat dalam rangka tugas akhir</marquee></h2>
    <div class="menu">
     <table><tr>
    <td>  
      <form action="pembeli.php">
              <input id="menu" type="submit" id="submit" value="Data Pembeli">
  </form></td>
    <td>
      <form action="lap_jual.php">
              <input id="menu" type="submit" id="submit" value="Laporan Penjualan">
  </form></td><td>  
        <form action="halaman_utama.php">
              <input id="menu" type="submit" id="submit" value="halaman utama">
  </form></td>
     <td>
</tr></table>
</div>
   </center>
</div>


<div class="barsamping"style="width:20%;height:80%;">
  <center><img src="hqhan.jpg" style="width:16.7vw;height:23.5vw;border: 4px solid white;margin-top: 3vw">
<p>Website ini dibuat oleh @hq.han<br>NIM : 2000018240</p></center>
</div>
<table style="padding-right: 15px;padding-left: 30px;padding-top: 10px;"><tr><td>
<div class="isi">
  <?php
  if (isset($_POST['updateKue'])) {
  $id_kue = $_POST['id_kue'];
    $transaksi = mysqli_query($conn, "select *from produk where id_kue=$id_kue");

      while ($data = mysqli_fetch_array($transaksi)) {
      $gambar = $data['gambar'];
      $id_kue = $data['id_kue'];
      $nama_kue = $data['nama_kue'];
      $jenis_kue = $data['jenis_kue'];
      $harga_kue = $data['harga_kue'];
      $stok = $data['stok']; 
      }   
    }                      
     ?>
     <table class="tabel">
      <form method="POST" enctype="multipart/form-data">
        <b style="font-size: 25px">Bila ingin mengganti gambar silahkan upload (tidak wajib) : </b><br>
        <Input style="font-size: 25px" type="file" name="gambar" value="gambar/<?= $gambar; ?>"> <br>
        <br>
        <b style="font-size: 25px">Nama Kue : </b><br>
          <input style="font-size: 25px" type="text" name="nama_kue" value="<?= $nama_kue; ?>" required>
          <br><br><b style="font-size: 25px">Jenis Kue : </b><br>
          <input style="font-size: 25px" type="text" name="jenis_kue" value="<?= $jenis_kue; ?>" required>
          <br /><br><b style="font-size: 25px">Harga Kue : </b><br>
          <input style="font-size: 25px" type="number" name="harga_kue" value="<?= $harga_kue; ?>" required>
          <br /><br><b style="font-size: 25px">Stok Kue : </b><br>
          <input style="font-size: 25px" type="number" name="stok" value="<?= $stok; ?>" required>
          <br /><br>
          <input style="font-size: 25px" type="hidden" name="id_kue" value="<?= $id_kue; ?>">
          <br />
          <button style="font-size: 25px" type="submit" name="updatekue">Update</button>
      </form>   
</table>


</div></td></tr></table>




<div class="footer">
  <strong><center>Terimakasih telah mengunjungi website buatan saya</center></strong>
  <strong style="font-size: 20px"><center>Copyright@ by Habbatul Qolbi H</center></strong>
</div>

</body>
</html>