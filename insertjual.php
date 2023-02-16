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
      <form action="halaman_utama.php">
              <input id="menu" type="submit" id="submit" value="Halaman Utama">
  </form></td>
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
    



<div class="barsamping"style="width:20%;height:80%;">
  <center><img src="hqhan.jpg" style="width:16.7vw;height:23.5vw;border: 4px solid white;margin-top: 3vw">
<p>Website ini dibuat oleh @hq.han<br>NIM : 2000018240</p></center>
</div>
<table style="padding-right: 15px;padding-left: 30px;padding-top: 10px;"><tr><td>
<div class="isi">
     <table class="tabel">


<form method="POST">
          <b style="font-size: 25px">Nama Pembeli : </b><br>
          <select style="font-size: 25px;width:380px;" name="id_pembeli">
                <option  selected value="<?= $id_pembeli; ?>">Pilih nama pembeli </option>
                <?php
                 $tampilanpembeli = mysqli_query($conn, "select * from pembeli");
                 while ($fetch = mysqli_fetch_array($tampilanpembeli)) {
                    $list_pembeli = $fetch['nama_pembeli'];
                    $id_pembeli = $fetch['id_pembeli'];
                ?>
                <option value="<?= $id_pembeli; ?>"><?= $list_pembeli; ?></option>
                <?php
                    }
                ?>
          </select><br />
  
                <br><b style="font-size: 25px">Kue yang dipilih : </b><br>
          <select style="font-size: 25px" name="kue" id="kue" required>
                 <option selected>pilih kue</option>
                 <?php
                 $tampilankue = mysqli_query($conn, "select * from produk");
                  while ($listkue = mysqli_fetch_array($tampilankue)) {
                        ?>
                            <option value="<?php echo $listkue['harga_kue'] ?>_<?php echo $listkue['id_kue'] ?>"><?php echo $listkue['nama_kue'] ?> <?php echo $listkue['jenis_kue'] ?> <?php echo $listkue['harga_kue'] ?>, <?php echo $listkue['stok'] ?></option>
                        <?php
                        }
                        ?>
            </select><br />
                    <br /><b style="font-size: 25px">Jumlah kue : </b><br>
                <input style="font-size: 25px" type="number" name="jumlah" placeholder="jumlah" id="jumlah"><br />
                    <br /><b style="font-size: 25px">Total harga : </b><br>
                <input style="font-size: 25px" type="number" name="total_harga" id="total_harga" placeholder="total harga"><br />
                    <br />
                    <button style="font-size: 25px" type="submit" name="insertlap">Tambah</button>
</form>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    var harga = 0;
    var jumlah = 0;
    var total = 0;
    $(document).ready(function() {
        $("#jumlah, #kue").on('change input', function() {
            var harga = $('#kue').val().split('_')||0;
            var jumlah = $("#jumlah").val();

            var total = parseInt(harga) * parseInt(jumlah);
            $("#total_harga").val(total);
        });
    });

</script>    
</table>
</div></td></tr></table>




<div class="footer">
  <strong><center>Terimakasih telah mengunjungi website buatan saya</center></strong>
  <strong style="font-size: 20px"><center>Copyright@ by Habbatul Qolbi H</center></strong>
</div>

</body>
</html>

