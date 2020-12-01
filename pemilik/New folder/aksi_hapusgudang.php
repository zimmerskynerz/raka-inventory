	<?php
	include "../koneksi.php";
?>
<?php
$id_barang = $_POST['id_mt'];
$status = $_POST['status'];



// Cek apakah gambar berhasil diupload atau tidak  // Proses simpan ke Database
//update member set nama='$nama', alamat='$alamat', email='$email', progdi = '$progdi' where nim='$nim'
$query = "update tb_barang set status ='".$status."' where id_barang = '".$id_barang."'";
$sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query
if($sql){
	header("location: barang_toko.php");
	}else{
		    echo "Maaf, Data tidak bisa di edit";    
			echo "<br><a href='barang_toko.php'>Kembali Ke Form</a>";
	}
	
	?>

