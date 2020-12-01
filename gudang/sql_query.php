<?php if (isset($_POST['updateData']))
		{ 
include "../koneksi.php";
$username	= $_POST['username'];
$pass		= $_POST['pass'];
$nama		= $_POST['nama'];
$tgl_lahir	= $_POST['tgl_lahir'];
$alamat		= $_POST['alamat'];
$kota		= $_POST['kota'];
$no_hp		= $_POST['no_hp'];

// Cek apakah gambar berhasil diupload atau tidak  // Proses simpan ke Database

$queryedit = "UPDATE `tb_user` SET 
`password`='".$pass."',
`nama`='".$nama."',
`tgl_lahir`='".$tgl_lahir."',
`alamat`='".$alamat."',
`kota`='".$kota."',
`no_hp`='".$no_hp."'
WHERE `username`='".$username."'";
$sqledit = mysqli_query($conn, $queryedit); // Eksekusi/ Jalankan query dari variabel $query
if($sqledit){
	header("location: index.php");
	}else{
		    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";    
			echo "<br><a href='index.php'>Kembali Ke Form</a>";
	}
		}
?>

<?php if (isset($_POST['tambahMasuk']))
		{ 
include "../koneksi.php";
$tgl_masuk		= $_POST['tgl_masuk'];
$username		= $_POST['username'];
// Cek apakah gambar berhasil diupload atau tidak  // Proses simpan ke Database
$queryedit = "update tb_barang set harga='".$harga."', stok =stok + '".$jml."' where id_brg = '".$id_brg."'";
$sqledit = mysqli_query($conn, $queryedit);

$query = "INSERT INTO tb_masuk VALUES(
'',
'".$tgl_masuk."',
'',
'".$username."',
'belum')";
$sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query
if($sql){
	header("location: masuk_rinci.php");
	}else{
		    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";    
			echo "<br><a href='masuk.php'>Kembali Ke Form</a>";
	}
		}
?>

<?php if (isset($_POST['tambahRinciMasuk']))
		{ 
include "../koneksi.php";
$id_brg			= $_POST['id_brg'];
$username		= $_POST['username'];
$id_masuk		= $_POST['id_masuk'];
$jml			= $_POST['jml'];
$harga			= $_POST['harga_beli'];

// Cek apakah ada kode barang yang dimaksud?
$cek = mysqli_query($conn,"select * from tb_barang where id_brg='$id_brg' and ket='ada'");
$cek_barang = mysqli_fetch_array($cek);
	if($cek_barang < 1){
		$cekhasil = mysqli_fetch_assoc($cek); //Cek hasil Rincian
		header("location:masuk_rinci.php?pesan=Maaf Kode atau barang tidak ada");
	}else{
		$tabel_rinci = mysqli_query($conn,"select * from rinci_masuk where id_brg='$id_brg' and id_masuk='$id_masuk'"); //cek apakah barang sudah ditambahkan atau belum
		$cek_masuk = mysqli_fetch_array($tabel_rinci);
		if($cek_masuk < 1){
			$cek_rincian = mysqli_fetch_assoc($cek_masuk); //Cek hasil Rincian
			$tambah_barang_masuk = "INSERT INTO `rinci_masuk`(`id_masuk`, `id_brg`, `harga`, `jml`) VALUES 
			('".$id_masuk."',
			'".$id_brg."',
			'".$harga."',
			'".$jml."')";
			$masuk = mysqli_query($conn, $tambah_barang_masuk);
			if($masuk){
				$editstok = "UPDATE `tb_barang` SET `stok` = `stok` + '".$jml."', `harga_beli` = '".$harga."' where `id_brg` = '".$id_brg."'";
				$stok_edity = mysqli_query($conn, $editstok);
				header("location: masuk_rinci.php");
			}else{
				echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";    
				echo "<br><a href='masuk_rinci.php'>Kembali Ke Form</a>";
			}
		}else{
			$rinci_masuk_edit = "update rinci_masuk set jml =jml + '".$jml."' where id_brg = '".$id_brg."' and '".$id_masuk."'";
			$rinci_edit_masuk = mysqli_query($conn, $rinci_masuk_edit);
			if($rinci_edit_masuk){
				$lihat_rinci = mysqli_query($conn,"select * from rinci_masuk where id_brg='$id_brg' and id_masuk='$id_masuk'");
				$rincian = mysqli_fetch_array($lihat_rinci);
				$kurangi = $rincian['jml'];
				$edit_stok_barang = "update tb_barang set stok =stok + '".$jml."',  `harga_beli` = '".$harga."' where id_brg = '".$id_brg."'";
				$stok_barang = mysqli_query($conn, $edit_stok_barang);
				header("location: masuk_rinci.php");
			}else{
				echo "Maaf, Terjadi kesalahan saat mencoba untuk mengedit data ke database.";    
				echo "<br><a href='masuk_rinci.php'>Kembali Ke Form</a>";
			}
		}
	}

	
	
		}
?>


<?php if (isset($_POST['editBrgMsk']))
		{ 
include "../koneksi.php";
$id_masuk	= $_POST['id_masuk'];
$id_brg		= $_POST['id_brg'];
$jml		= $_POST['jml'];
$harga		= $_POST['harga'];
$cek = mysqli_query($conn,"select * from rinci_masuk where id_brg='$id_brg' and id_masuk='$id_masuk'");
$cek_barang = mysqli_fetch_array($cek);
	if($cek_barang){
		$cekhasil = mysqli_fetch_assoc($cek); //Cek hasil Rincian
		$jml_awal = $cek_barang['jml'];
		$edit_stok_barang = "update tb_barang set stok =(stok - '".$jml_awal."') + '".$jml."',  `harga_beli` ='".$harga."' where id_brg = '".$id_brg."'";
		$jumlah_stok = mysqli_query($conn, $edit_stok_barang);
		$edit_masuk_barang = "update rinci_masuk set jml ='".$jml."',  `harga` = '".$harga."' where id_brg = '".$id_brg."' and id_masuk='".$id_masuk."'";
		$jumlah_barang = mysqli_query($conn, $edit_masuk_barang); // Eksekusi/ Jalankan query dari variabel $query
		header("location: masuk_rinci.php");
	}else{
		echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";    
			echo "<br><a href='masuk_rinci.php'>Kembali Ke Form</a>";
	}
	
		}
?>

<?php if (isset($_POST['hapusBrgMsk']))
		{ 
include "../koneksi.php";
$id_masuk	= $_POST['id_masuk'];
$id_brg		= $_POST['id_brg'];
$jml		= $_POST['jml'];
$harga		= $_POST['harga'];
$cek = mysqli_query($conn,"select * from rinci_masuk where id_brg='$id_brg' and id_masuk='$id_masuk'");
$cek_barang = mysqli_fetch_array($cek);
	if($cek_barang){
		$cekhasil = mysqli_fetch_assoc($cek); //Cek hasil Rincian
		$jml_awal = $cek_barang['jml'];
		$edit_stok_barang = "update tb_barang set stok =(stok - '".$jml_awal."'),  `harga_beli` ='".$harga."' where id_brg = '".$id_brg."'";
		$jumlah_stok = mysqli_query($conn, $edit_stok_barang);
		$edit_masuk_barang = "DELETE FROM rinci_masuk where id_brg = '".$id_brg."' and id_masuk='".$id_masuk."'";
		$jumlah_barang = mysqli_query($conn, $edit_masuk_barang); // Eksekusi/ Jalankan query dari variabel $query
		header("location: masuk_rinci.php");
	}else{
		echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";    
			echo "<br><a href='masuk_rinci.php'>Kembali Ke Form</a>";
	}
	
		}
?>


<?php if (isset($_POST['simpanBarang']))
		{ 
include "../koneksi.php";
$id_masuk	= $_POST['id_masuk'];
$ttl	= $_POST['ttl'];


		$simpan_barang_masuk = "UPDATE tb_masuk set total_hrg='".$ttl."', ket='selesai' where id_masuk = '".$id_masuk."'";
		$simpan_masuk = mysqli_query($conn, $simpan_barang_masuk); // Eksekusi/ Jalankan query dari variabel $query
		if($simpan_masuk){
		header("location: masuk.php");
		}else{
			echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";    
			echo "<br><a href='masuk_rinci.php'>Kembali Ke Form</a>";
		}
		}
?>

<?php if (isset($_POST['tambahKeluar']))
		{ 
include "../koneksi.php";
$tgl_keluar		= $_POST['tgl_keluar'];
$username		= $_POST['username'];
$status			= $_POST['status'];
// Cek apakah gambar berhasil diupload atau tidak  // Proses simpan ke Database
$queryedit = "update tb_barang set harga='".$harga."', stok =stok + '".$jml."' where id_brg = '".$id_brg."'";
$sqledit = mysqli_query($conn, $queryedit);

$query = "INSERT INTO tb_keluar VALUES(
'',
'".$tgl_keluar."',
'',
'".$status."',
'".$username."',
'belum')";
$sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query
if($sql){
	header("location: keluar_rinci.php");
	}else{
		    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";    
			echo "<br><a href='keluar.php'>Kembali Ke Form</a>";
	}
		}
?>

<?php if (isset($_POST['tambahRinciKeluar']))
		{ 
include "../koneksi.php";
$id_brg			= $_POST['id_brg'];
$username		= $_POST['username'];
$id_keluar		= $_POST['id_keluar'];
$jml			= $_POST['jml'];
$harga_jual			= $_POST['harga_jual'];

// Cek apakah ada kode barang yang dimaksud?
$cek = mysqli_query($conn,"select * from tb_barang where id_brg='$id_brg' and ket='ada'");
$cek_barang = mysqli_fetch_array($cek);
	if($cek_barang < 1){
		$cekhasil = mysqli_fetch_assoc($cek); //Cek hasil Rincian
		header("location:keluar_rinci.php?pesan=Maaf Kode atau barang tidak ada");
	}else{
		$tabel_rinci = mysqli_query($conn,"select * from rinci_keluar where id_brg='$id_brg' and id_keluar='$id_keluar'"); //cek apakah barang sudah ditambahkan atau belum
		$cek_keluar = mysqli_fetch_array($tabel_rinci);
		if($cek_keluar < 1){
			$cek_rincian = mysqli_fetch_assoc($cek_keluar); //Cek hasil Rincian
			$tambah_barang_keluar = "INSERT INTO `rinci_keluar`(`id_keluar`, `id_brg`, `harga`, `jml`) VALUES 
			('".$id_keluar."',
			'".$id_brg."',
			'".$harga_jual."',
			'".$jml."')";
			$keluar = mysqli_query($conn, $tambah_barang_keluar);
			if($keluar){
				$editstok = "UPDATE `tb_barang` SET `stok` = `stok` - '".$jml."' where `id_brg` = '".$id_brg."'";
				$stok_edity = mysqli_query($conn, $editstok);
				header("location: keluar_rinci.php");
			}else{
				echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";    
				echo "<br><a href='keluar_rinci.php'>Kembali Ke Form</a>";
			}
		}else{
			$rinci_keluar_edit = "update rinci_keluar set jml =jml + '".$jml."' where id_brg = '".$id_brg."' and '".$id_keluar."'";
			$rinci_edit_keluar = mysqli_query($conn, $rinci_keluar_edit);
			if($rinci_edit_keluar){
				$lihat_rinci = mysqli_query($conn,"select * from rinci_keluar where id_brg='$id_brg' and id_keluar='$id_keluar'");
				$rincian = mysqli_fetch_array($lihat_rinci);
				$kurangi = $rincian['jml'];
				$edit_stok_barang = "update tb_barang set stok =stok - '".$jml."' where id_brg = '".$id_brg."'";
				$stok_barang = mysqli_query($conn, $edit_stok_barang);
				header("location: keluar_rinci.php");
			}else{
				echo "Maaf, Terjadi kesalahan saat mencoba untuk mengedit data ke database.";    
				echo "<br><a href='keluar_rinci.php'>Kembali Ke Form</a>";
			}
		}
	}

	
	
		}
?>

<?php if (isset($_POST['editBrgKeluar']))
		{ 
include "../koneksi.php";
$id_keluar	= $_POST['id_keluar'];
$id_brg		= $_POST['id_brg'];
$jml		= $_POST['jml'];
$harga		= $_POST['harga'];
$cek = mysqli_query($conn,"select * from rinci_keluar where id_brg='$id_brg' and id_keluar='$id_keluar'");
$cek_barang = mysqli_fetch_array($cek);
	if($cek_barang){
		$cekhasil = mysqli_fetch_assoc($cek); //Cek hasil Rincian
		$jml_awal = $cek_barang['jml'];
		$edit_stok_barang = "update tb_barang set stok =(stok + '".$jml_awal."') - '".$jml."' where id_brg = '".$id_brg."'";
		$jumlah_stok = mysqli_query($conn, $edit_stok_barang);
		$edit_keluar_barang = "update rinci_keluar set jml ='".$jml."' where id_brg = '".$id_brg."' and id_keluar='".$id_keluar."'";
		$jumlah_barang = mysqli_query($conn, $edit_keluar_barang); // Eksekusi/ Jalankan query dari variabel $query
		header("location: keluar_rinci.php");
	}else{
		echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";    
			echo "<br><a href='keluar_rinci.php'>Kembali Ke Form</a>";
	}
	
		}
?>

<?php if (isset($_POST['hapusBrgKeluar']))
		{ 
include "../koneksi.php";
$id_keluar	= $_POST['id_keluar'];
$id_brg		= $_POST['id_brg'];
$jml		= $_POST['jml'];
$harga		= $_POST['harga'];
$cek = mysqli_query($conn,"select * from rinci_keluar where id_brg='$id_brg' and id_keluar='$id_keluar'");
$cek_barang = mysqli_fetch_array($cek);
	if($cek_barang){
		$cekhasil = mysqli_fetch_assoc($cek); //Cek hasil Rincian
		$jml_awal = $cek_barang['jml'];
		$edit_stok_barang = "update tb_barang set stok =(stok + '".$jml_awal."') where id_brg = '".$id_brg."'";
		$jumlah_stok = mysqli_query($conn, $edit_stok_barang);
		$edit_keluar_barang = "DELETE FROM rinci_keluar where id_brg = '".$id_brg."' and id_keluar='".$id_keluar."'";
		$jumlah_barang = mysqli_query($conn, $edit_keluar_barang); // Eksekusi/ Jalankan query dari variabel $query
		header("location: keluar_rinci.php");
	}else{
		echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";    
			echo "<br><a href='keluar_rinci.php'>Kembali Ke Form</a>";
	}
	
		}
?>

<?php if (isset($_POST['simpanBarangK']))
		{ 
include "../koneksi.php";
$id_keluar	= $_POST['id_keluar'];
$ttl	= $_POST['ttl'];


		$simpan_barang_keluar = "UPDATE tb_keluar set total_hrg='".$ttl."', ket='selesai' where id_keluar = '".$id_keluar."'";
		$simpan_keluar = mysqli_query($conn, $simpan_barang_keluar); // Eksekusi/ Jalankan query dari variabel $query
		if($simpan_keluar){
		header("location: keluar.php");
		}else{
			echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";    
			echo "<br><a href='keluar_rinci.php'>Kembali Ke Form</a>";
		}
		}
?>