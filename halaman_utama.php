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
  </form></td>
     <td>
</tr></table>
</div>
   </center>
</div>


<div class="barsamping" style="width:20%;height:100%;">
  <center><img src="hqhan.jpg" style="width:16.7vw;height:23.5vw;border: 4px solid white;margin-top: 3vw">
  <p>Website ini dibuat oleh @hq.han<br>NIM : 2000018240</p></center>
</div>
<table style="padding-right: 15px;padding-left: 30px;padding-top: 10px;"><tr><td>
<div class="isi">
     <table class="tabel"> 
            <form action="insertKue.php">
              <input id="menu" type="submit" id="submit" value="Tambahkan data kue">
  </form><br><br>                      <h2 style="color:gray;padding-top: 10px;">Data Produk kue</h2>
                             
                                        <tr class="tabel">
                                            <th class="tabel">Gambar kue</th>
                                            <th class="tabel">Nama Kue</th>
                                            <th class="tabel">Jenis Kue</th>
                                            <th class="tabel">Harga</th>
                                            <th class="tabel">Stok</th>
                                            <th class="tabel">Pilihan</th>
                                        </tr>
                                
                                        <?php
                                        $transaksi = mysqli_query($conn, "select * from produk");

                                        while ($data = mysqli_fetch_array($transaksi)) {
                                            $gambar = $data['gambar'];
                                            $id_kue = $data['id_kue'];
                                            $nama_kue = $data['nama_kue'];
                                            $jenis_kue = $data['jenis_kue'];
                                            $harga_kue = $data['harga_kue'];
                                            $stok = $data['stok'];
                                 
                                        ?>
                                            <tr>
                                                <td class="tabel"><img src="gambar/<?= $gambar; ?>" width="150"></td>
                                                <td class="tabel"><?= $nama_kue; ?></td>
                                                <td class="tabel"><?= $jenis_kue; ?></td>
                                                <td class="tabel">Rp <?= $harga_kue; ?></td>
                                                <td class="tabel"><?= $stok; ?></td>
                                                <td class="tabel">

                                                <form method="POST">
                                                <input type="hidden" name="id_kue" value="<?= $id_kue; ?>">
                                                <button style="background-color: lightgray;"type="submit" onclick="return confirm('Apa anda yakin untuk hapus?');" name="deleteKue">DELETE
                                                </button></form>

                                                <form method="POST" action="updateKue.php">
                                                <input type="hidden" name="id_kue" value="<?= $id_kue; ?>">
                                                <button style="background-color: lightgray;"type="submit" name="updateKue">UPDATE</button>
                                               </form>

                                                </td>
                                            </tr>

                                          <?php
                                          }
                                          ?>            

                                          </table>
</div></td></tr></table>




<div class="footer">
  <strong><center>Terimakasih telah mengunjungi website buatan saya</center></strong>
  <strong style="font-size: 20px"><center>Copyright@ by Habbatul Qolbi H</center></strong>
</div>

</body>
</html>