<?php

$conn = mysqli_connect("localhost", "root", "", "kuebolu");


//delete kue
if (isset($_POST['deleteKue'])) {
	$id_kue = $_POST['id_kue'];

	$deleteKue = mysqli_query($conn, "delete from produk where id_kue='$id_kue'");
	if ($deleteKue) {
		header('location:halaman_utama.php');
	} else {
		echo "<script>
		alert ('data gagal dihapus');
		</script>";
		header('location:halaman_utama.php');
	}
}
//delete data laporan jual
if (isset($_POST['deletePenjualan'])) {
	$id_penjualan = $_POST['id_penjualan'];

	$deletePenjualan = mysqli_query($conn, "delete from lap_penjualan where id_penjualan='$id_penjualan'");
	if ($deletePenjualan) {
		header('location:halaman_utama.php');
	} else {
		echo "<script>
		alert ('data gagal dihapus');
		</script>";
		header('location:halaman_utama.php');
	}
}
//insert roti
if (isset($_POST['insertkue'])) {
	$gambar = $_FILES['gambar']['name'];
	$tmp_file = $_FILES['gambar']['tmp_name'];
	$nama_kue = $_POST['nama_kue'];
	$jenis_kue = $_POST['jenis_kue'];
	$harga_kue = $_POST['harga_kue'];
	$stok = $_POST['stok'];
    $path = "gambar/";
    move_uploaded_file($tmp_file, $path.$gambar);

	$tambahrt = mysqli_query($conn, "insert into produk (gambar, nama_kue, jenis_kue, harga_kue, stok) values ('$gambar', '$nama_kue', '$jenis_kue', '$harga_kue', '$stok')");
	if ($tambahrt) {
		header('location:halaman_utama.php');

	} else {
		echo "<script>
		alert ('data gagal dihapus');
		</script>";
		header('location:insertKue.php');
	}
}
//update kue
if (isset($_POST['updatekue'])) {
	$id_kue = $_POST['id_kue'];
	$nama_kue = $_POST['nama_kue'];
	$jenis_kue = $_POST['jenis_kue'];
	$harga_kue = $_POST['harga_kue'];
	$stok = $_POST['stok'];

 if(empty($_FILES['gambar']['name'])){
 	$updatek = mysqli_query($conn, "update produk set nama_kue='$nama_kue', jenis_kue='$jenis_kue' , harga_kue='$harga_kue', stok='$stok' where produk.id_kue='$id_kue' ");}
 else{
 	$gambar = $_FILES['gambar']['name'];  //nama gambar
	$tmp_file = $_FILES['gambar']['tmp_name']; //temporary default xampp gambar diupload
    $path = "gambar/";
    move_uploaded_file($tmp_file, $path.$gambar);
 	$updatek = mysqli_query($conn,"update produk set gambar='$gambar', nama_kue='$nama_kue', jenis_kue='$jenis_kue', harga_kue='$harga_kue', stok='$stok' where produk.id_kue='$id_kue' ");
 }
	if ($updatek) {
		header('location:halaman_utama.php');
	} else {
		echo "<script>
		alert ('data gagal dihapus');
		</script>";
		header('location:halaman_utama.php');
	}
}
//tambah laporan penjualan
if (isset($_POST['insertlap'])) {
	$pembeli = $_POST['id_pembeli'];
	$kue = explode('_',$_POST['kue']); //[0]=harganya, [1]=id kue
	$jumlah = $_POST['jumlah'];
	$total_harga = $_POST['total_harga'];

	$lihatstock = mysqli_query($conn, "select* from produk where id_kue='$kue[1]'");
	$stocknya = mysqli_fetch_array($lihatstock); //astoknya untuk ketersediaan kue
	$stockskrg = $stocknya['stok'];

	if ($jumlah > $stockskrg) {
		echo "<script>
		alert ('data gagal ditambahkan, coba cek lagi isian datanya');
		</script>";
	} else {
		$tambahtransaksi = mysqli_query($conn, "insert into lap_penjualan (id_pembeli, id_kue, jumlah, total_harga) values ('$pembeli', '$kue[1]', '$jumlah', '$total_harga')");
		header('location:lap_jual.php');
	}
}

//delete pembeli
if (isset($_POST['deletePembeli'])) {
	$id_pembeli = $_POST['id_pembeli'];
	$deletePembeli = mysqli_query($conn, "delete from pembeli where id_pembeli='$id_pembeli'");
	if ($deletePembeli) {
		header('location:pembeli.php');
	} else {
		echo "<script>
		alert ('data gagal dihapus');
		</script>";
		header('location:pembeli.php');
	}
}
//insert pembeli
if (isset($_POST['insertPembeli'])) {
	$nama_pelanggan = $_POST['nama_pembeli'];
	$alamat = $_POST['alamat'];

	$tambahpembeli = mysqli_query($conn, "insert into pembeli (nama_pembeli, alamat) values ('$nama_pelanggan', '$alamat')");
	if ($tambahpembeli) {
		header('location:pembeli.php');

	} else {
		echo "<script>
		alert ('data gagal dihapus');
		</script>";
		header('location:insertPembeli.php');
	}
}
?>
