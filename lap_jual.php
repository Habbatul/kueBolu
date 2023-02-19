<?php
require 'fungsi.php';
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
      <form action="halaman_utama.php">
              <input id="menu" type="submit" id="submit" value="Data Produk Kue">
  </form></td>
    <td>
      <form action="pembeli.php">
              <input id="menu" type="submit" id="submit" value="Data Pembeli">
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
              <form action="insertjual.php">
                <input id="menu" type="submit" id="submit" value="Tambahkan Laporan Penjualan">
              </form><h2  style="color:gray;padding-top: 10px;display: inline;">Laporan Penjualan</h2>
     <table class="tabel">
                                        <tr class="tabel">
                                            <th class="tabel">id penjualan</th>
                                            <th class="tabel">nama pembeli</th>
                                            <th class="tabel">Kue yang dibeli</th>
                                            <th class="tabel">Jumlah </th>
                                            <th class="tabel">total harga</th>
                                            <th class="tabel">Tanggal beli</th>
                                            <th class="tabel">Pilihan</th>
                                        </tr>
                                
                                        <?php
                                        $transaksi = mysqli_query($conn, "select * from lap_penjualan left join pembeli on lap_penjualan.id_pembeli=pembeli.id_pembeli left join produk on lap_penjualan.id_kue=produk.id_kue where produk.id_kue=2");

                                        while ($data = mysqli_fetch_array($transaksi)) {
                                            $id_penjualan = $data['id_penjualan'];
                                            $id_pembeli = $data['id_pembeli'];
                                            $nama_pembeli = $data['nama_pembeli'];
                                            $jumlah = $data['jumlah'];
                                            $total_harga = $data['total_harga'];
                                            $tanggal = $data['tanggal'];
                                            $id_kue =$data['id_kue'];
                                            $nama_kue =$data['nama_kue'];
                                        ?>
                                            <tr>
                                                <td class="tabel"><?= $id_penjualan; ?></td>
                                                <td class="tabel"><?= $nama_pembeli; ?></td>
                                                <td class="tabel"><?= $nama_kue; ?></td>
                                                <td class="tabel"><?= $jumlah; ?></td>
                                                <td class="tabel">Rp <?= $total_harga; ?></td>
                                                <td class="tabel"><?= $tanggal; ?></td>
                                                <td>
                                            <form method="POST"><br>
                                                <input type="hidden" name="id_penjualan" value="<?= $id_penjualan; ?>">
                                                <button style="background-color: lightgray;"type="submit" onclick="return confirm('Apa anda yakin?');" name="deletePenjualan">DELETE
                                                </button></form></td>
                                            </tr>
                                          <?php
                                          }
                                          ?> 
                                          <?php 
                                          $transaksi = mysqli_query($conn, "select * from lap_penjualan left join pembeli on lap_penjualan.id_pembeli=pembeli.id_pembeli where lap_penjualan.total_harga = (select max(total_harga) from lap_penjualan);");  
                                          while ($data = mysqli_fetch_array($transaksi)) {
                                            $id_penjualan = $data['id_penjualan'];
                                            $id_pembeli = $data['id_pembeli'];
                                            $nama_pembeli = $data['nama_pembeli'];
                                            $total_harga = $data['total_harga'];
                                          ?>
                                          <tr>
                                              <th class="tabel" colspan="5"><br>Pembeli dengan pembelian terbanyak : <br><br></th>
                                              <td class="tabel" colspan="2"><br><?= $nama_pembeli ?></td><br><br>
                                            </tr> 
                                                <?php
                                                $total_seluruh=0;
                                                $total_seluruh += $total_harga;
                                          }
                                            if(empty($total_seluruh)){}
                                              else{ 
                                          ?> 
                                            <tr>
                                               <th class="tabel" colspan="5"><br>Total Penjualan : <br><br></th>
                                              <td class="tabel" colspan="2"><br>Rp <?= $total_seluruh ?><br><br></td>
                                            </tr>
                                          <?php }?>
                                          </table>
   <form action="lap_bulanan.php">
              <input id="menu" type="submit" id="submit" value="Lihat Data PerBulan">
  </form></td>
</div></td></tr></table>

<div class="footer">
  <strong><center>Terimakasih telah mengunjungi website buatan saya</center></strong>
  <strong style="font-size: 20px"><center>Copyright@ by Habbatul Qolbi H</center></strong>
</div>

</body>
</html>