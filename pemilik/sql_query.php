<?php if (isset($_POST['tambahUsr']))
		{ 
include "../koneksi.php";
$username	= $_POST['username'];
$password	= $_POST['password'];
$nama		= $_POST['nama'];
$tanggal	= $_POST['tanggal'];
$bulan		= $_POST['bulan'];
$tahun		= $_POST['tahun'];
$tgl_lahir	= $tahun."-".$bulan."-".$tanggal;
$alamat		= $_POST['alamat'];
$kota		= $_POST['kota'];
$no_hp		= $_POST['no_hp'];
$jabatan	= $_POST['jabatan'];
$ket	= $_POST['ket'];
// Cek apakah gambar berhasil diupload atau tidak  // Proses simpan ke Database

$query = "INSERT INTO tb_user VALUES(
'".$username."',
'".$password."',
'".$nama."',
'".$tgl_lahir."',
'".$alamat."',
'".$kota."',
'".$no_hp."',
'".$jabatan."',
'".$ket."')";
$sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query
if($sql){
	header("location: user.php");
	}else{
		    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";    
			echo "<br><a href='user.php'>Kembali Ke Form</a>";
	}
		}
?>


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

<?php
if (isset($_POST['hapusKategori']))
		{ 
include "../koneksi.php";
$kategori = $_POST['id_mt'];
$status = ['status'];

// Cek apakah gambar berhasil diupload atau tidak  // Proses simpan ke Database

$queryhapus = "update tb_kategori set status='".$status."' where id_kategori = '".$kategori."'";
$sqlhapus = mysqli_query($conn, $queryhapus); // Eksekusi/ Jalankan query dari variabel $query
if($sqlhapus){
	header("location: pegawai_kategori.php");
	}else{
		    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";    
			echo "<br><a href='pegawai_kategori.php'>Kembali Ke Form</a>";
	}
		}
?>


<?php
if (isset($_POST['updateKategori2']))
		{ 
include "../koneksi.php";
$id_kategori = $_POST['id_mt'];
$nm_kategori	= $_POST['nm_brg'];
$ket	= $_POST['ket'];

// Cek apakah gambar berhasil diupload atau tidak  // Proses simpan ke Database

$queryedit = "update tb_kategori set nm_kategori='".$nm_kategori."',
ket ='".$ket."' where id_kategori = '".$id_kategori."'";
$sqledit = mysqli_query($conn, $queryedit); // Eksekusi/ Jalankan query dari variabel $query
if($sqledit){
	header("location: kategori_toko.php");
	}else{
		    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";    
			echo "<br><a href='kategori_toko.php'>Kembali Ke Form</a>";
	}
		}
?>


<?php
if (isset($_POST['hapusKategori2']))
		{ 
include "../koneksi.php";
$kategori = $_POST['id_mt'];
$status = ['status'];

// Cek apakah gambar berhasil diupload atau tidak  // Proses simpan ke Database

$queryhapus = "update tb_kategori set status='".$status."' where id_kategori = '".$kategori."'";
$sqlhapus = mysqli_query($conn, $queryhapus); // Eksekusi/ Jalankan query dari variabel $query
if($sqlhapus){
	header("location: kategori_toko.php");
	}else{
		    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";    
			echo "<br><a href='kategori_toko.php'>Kembali Ke Form</a>";
	}
		}
?>

<?php
if (isset($_POST['updatekasir']))
		{ 
include "../koneksi.php";
$nm_kasir = $_POST['nm_kasir'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];
$id_kasir = $_POST['id_kasir'];
// Cek apakah gambar berhasil diupload atau tidak  // Proses simpan ke Database

$queryhapus = "update tb_kasir set nm_kasir='".$nm_kasir."',
alamat='".$alamat."',
no_hp='".$no_hp."' where id_kasir = '".$id_kasir."'";
$sqlhapus = mysqli_query($conn, $queryhapus); // Eksekusi/ Jalankan query dari variabel $query
if($sqlhapus){
	header("location: karyawan_toko.php");
	}else{
		    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";    
			echo "<br><a href='karyawan_toko.php'>Kembali Ke Form</a>";
	}
		}
?>

<?php
if (isset($_POST['hapuskasir']))
		{ 
include "../koneksi.php";
$username = $_POST['username'];
$status = $_POST['status'];
// Cek apakah gambar berhasil diupload atau tidak  // Proses simpan ke Database

$queryhapus = "update tb_user set status='".$status."' where username = '".$username."'";
$sqlhapus = mysqli_query($conn, $queryhapus); // Eksekusi/ Jalankan query dari variabel $query
if($sqlhapus){
	header("location: karyawan_toko.php");
	}else{
		    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";    
			echo "<br><a href='karyawan_toko.php'>Kembali Ke Form</a>";
	}
		}
?>


<?php
if (isset($_POST['identoko']))
		{ 
include "../koneksi.php";
$username = $_POST['username'];
$nm_toko = $_POST['nm_toko'];
$alamat_toko = $_POST['alamat_toko'];
$bd_usaha = $_POST['bd_usaha'];
$jual = $_POST['jual'];
$diskon = $_POST['diskon'];
$modal_awal = $_POST['modal_awal'];
$nm_bank = $_POST['nm_bank'];
$no_rek = $_POST['no_rek'];
$an = $_POST['an'];

$queryedit = "update tb_identitas set nm_toko='".$nm_toko."',
			  alamat_toko ='".$alamat_toko."',
			  bd_usaha='".$bd_usaha."',
			  jual ='".$jual."',
			  diskon='".$diskon."',
			  modal_awal ='".$modal_awal."',
			  nm_bank ='".$nm_bank."',
			  no_rek ='".$no_rek."',
			  an ='".$an."' where username = '".$username."'";
$sqledit = mysqli_query($conn, $queryedit); // Eksekusi/ Jalankan query dari variabel $query
if($sqledit){
	header("location: index.php");
	}else{
		    echo "Maaf, Data tidak bisa di edit";    
			echo "<br><a href='index.php'>Kembali Ke Form</a>";
	}
		}
?>

<?php
if (isset($_POST['ugambar']))
		{ 
include "../koneksi.php";
$username = $_POST['username'];

// foto1
$logo = $_FILES['logo']['name'];
$tmp = $_FILES['logo']['tmp_name'];
$logobaru = date('dmYHis').$logo;
$path = "admin/logo/".$logobaru;

// foto 2
$stempel = $_FILES['stempel']['name'];
$tmp2 = $_FILES['stempel']['tmp_name'];
$stempelbaru = date('dmYHis').$stempel;
$path2 = "admin/stempel/".$stempelbaru;

// foto 3
$ktp = $_FILES['ktp']['name'];
$tmp3 = $_FILES['ktp']['tmp_name'];
$gktp = date('dmYHis').$ktp;
$path3 = "admin/ktp/".$gktp;

if(move_uploaded_file($tmp, $path)){

$queryedit = "update tb_identitas set logo='".$logobaru."' where username = '".$username."'";
$sqledit = mysqli_query($conn, $queryedit); // Eksekusi/ Jalankan query dari variabel $query
if($sqledit){
	header("location: index.php");
	}else{
		    echo "Maaf, Data tidak bisa di edit";    
			echo "<br><a href='index.php'>Kembali Ke Form</a>";
	}
		}
if(move_uploaded_file($tmp2, $path2)){ 
// Cek apakah gambar berhasil diupload atau tidak  // Proses simpan ke Database

$query = "update tb_identitas set stempel ='".$stempelbaru."' where username = '".$username."'";
$sql = mysqli_query($conn, $query);
 // Eksekusi/ Jalankan query dari variabel $query
if($sql){
	header("location: index.php");
	
	}else{
		    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";    
			echo "<br><a href='index.php'>Kembali Ke Form</a>";
	}
	}
if(move_uploaded_file($tmp3, $path3)){ 
// Cek apakah gambar berhasil diupload atau tidak  // Proses simpan ke Database

$query = "update tb_identitas set gktp ='".$gktp."' where username = '".$username."'";
$sql = mysqli_query($conn, $query);
 // Eksekusi/ Jalankan query dari variabel $query
if($sql){
	header("location: index.php");
	
	}else{
		    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";    
			echo "<br><a href='index.php'>Kembali Ke Form</a>";
	}
	}
		}
?>

<?php if (isset($_POST['tambahkategori']))
		{ 
include "../koneksi.php";

$nm_kategori = $_POST['nm_kategori'];
$ket = $_POST['ket'];
$status = $_POST['status'];
$id_toko = $_POST['id_toko'];

$query = "INSERT INTO tb_kategori VALUES(
'',
'".$nm_kategori."',
'".$ket."',
'".$status."',
'".$id_toko."')";
$sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query
if($sql){
	header("location: pegawai_barang.php");
	}else{
		    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";    
			echo "<br><a href='pegawai_barang.php'>Kembali Ke Form</a>";
	}
		}
?>
<?php if (isset($_POST['tambahbarang']))
		{ 
include "../koneksi.php";
$id_brg = $_POST['id_brg'];
$nm_brg = $_POST['nm_barang'];
$stok = $_POST['stok'];
$hg_bl = $_POST['hb'];
$hg_jl = $_POST['hj'];
$status = $_POST['status'];
$id_toko = $_POST['id_toko'];
$id_kategori = $_POST['id_kategori'];

include "phpqrcode/qrlib.php"; //<-- LOKASI FILE UTAMA PLUGINNYA
 
$tempdir = "admin/qrcode/"; //<-- Nama Folder file QR Code kita nantinya akan disimpan
if (!file_exists($tempdir))#kalau folder belum ada, maka buat.
    mkdir($tempdir);
 //lanjutan yang tadi
 
#parameter inputan
$isi_teks = $id_brg;
$namafile = "$isi_teks.png";
$quality = 'H'; //ada 4 pilihan, L (Low), M(Medium), Q(Good), H(High)
$ukuran = 5; //batasan 1 paling kecil, 10 paling besar
$padding = 0;
 
QRCode::png($isi_teks,$tempdir.$namafile,$quality,$ukuran,$padding);
 

// Cek apakah gambar berhasil diupload atau tidak  // Proses simpan ke Database

$query = "INSERT INTO tb_barang VALUES(
'".$id_brg."',
'".$nm_brg."',
'".$stok."',
'".$hg_bl."',
'".$hg_jl."',
'".$status."',
'".$namafile."',
'".$id_toko."',
'".$id_kategori."')";
$sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query
if($sql){
	header("location: pegawai_barang.php");
	}else{
		    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";    
			echo "<br><a href='pegawai_barang.php'>Kembali Ke Form</a>";
	}
	}
?>
<?php if (isset($_POST['updateBarang']))
		{ 
include "../koneksi.php";

$tgl_so = $_POST['tgl_so'];
$id_toko = $_POST['id_toko'];
$id_kasir = $_POST['id_kasir'];
$id_brg = $_POST['id_brg'];
$nm_brg = $_POST['nm_brg'];
$hg_jl = $_POST['hj'];
$stok = $_POST['stok'];
$ket = $_POST['ket'];
$id_kategori = $_POST['id_kategori'];

$query = "INSERT INTO so VALUES(
'',
'".$tgl_so."',
'".$id_brg."',
'".$stok."',
'".$hg_jl."',
'".$ket."',
'".$id_toko."',
'".$id_kasir."')";
$sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query
if($sql){
	$queryupdate = "update tb_barang set nm_brg ='".$nm_brg."',
					stok ='".$stok."',
					hg_jl ='".$hg_jl."',
					id_kategori ='".$id_kategori."' where id_brg = '".$id_brg."' and id_toko='$id_toko'";
	$update = mysqli_query($conn, $queryupdate);
	header("location: pegawai_barang.php");
	}else{
		    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";    
			echo "<br><a href='pegawai_barang.php'>Kembali Ke Form</a>";
	}
		}
?>
<?php if (isset($_POST['updateSO']))
		{ 
include "../koneksi.php";

$tgl_so = $_POST['tgl_so'];
$id_toko = $_POST['id_toko'];
$id_kasir = $_POST['id_kasir'];
$id_brg = $_POST['id_brg'];
$hg_jl = $_POST['hg_jl'];
$stok = $_POST['stok'];
$ket = $_POST['ket'];

$query = "INSERT INTO so VALUES(
'',
'".$tgl_so."',
'".$id_brg."',
'".$stok."',
'".$hg_jl."',
'".$ket."',
'".$id_toko."',
'".$id_kasir."')";
$sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query
if($sql){
	$queryupdate = "update tb_barang set stok ='".$stok."', hg_jl ='".$hg_jl."'
					where id_brg = '".$id_brg."' and id_toko='$id_toko'";
	$update = mysqli_query($conn, $queryupdate);
	header("location: pegawai_barangopname.php");
	}else{
		    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";    
			echo "<br><a href='pegawai_barangopname.php'>Kembali Ke Form</a>";
	}
		}
?>
<?php if (isset($_POST['hapusBarang']))
		{ 
include "../koneksi.php";
$id_barang = $_POST['id_mt'];
$status = ['status'];

// Cek apakah gambar berhasil diupload atau tidak  // Proses simpan ke Database

$queryhapus = "update tb_barang set status='".$status."' where id_brg = '".$id_barang."'";
$sqlhapus = mysqli_query($conn, $queryhapus); // Eksekusi/ Jalankan query dari variabel $query
if($sqlhapus){
	header("location: pegawai_barang.php");
	}else{
		    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";    
			echo "<br><a href='pegawai_barang.php'>Kembali Ke Form</a>";
	}
		}
?>
<?php if (isset($_POST['hapus_tr_br']))
		{ 
include "../koneksi.php";
$id_transaksi = $_POST['id_tr'];
$id_brg = $_POST['id_brg'];
$jml = $_POST['jml'];

$queryupdate = "update tb_barang set stok =stok+'".$jml."' where id_brg = '".$id_brg."'";
$update = mysqli_query($conn, $queryupdate);
$sqlhapus = "delete from tb_rinci_transaksi where id_brg = '".$id_brg."' and id_tr = '".$id_transaksi."'";
$sql = mysqli_query($conn, $sqlhapus);

// Cek apakah gambar berhasil diupload atau tidak  // Proses simpan ke Database

 // Eksekusi/ Jalankan query dari variabel $query
if($sql){
	header("location: transaksi_aksi.php");
	}else{
		    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";    
			echo "<br><a href='transaksi_aksi.php'>Kembali Ke Form</a>";
	}
		}
?>
<?php if (isset($_POST['tambahtr']))
		{ 
include "../koneksi.php";
$tgl_beli = $_POST['tgl_beli'];
$id_toko = $_POST['id_toko'];
$id_kasir = $_POST['id_kasir'];
$status = $_POST['status'];
$tambah = "<script>window.open('transaksi_aksi.php', 'POS Transaksi', 'height=700, width=700, scrollbars=yes')</script>";

$query = "INSERT INTO tb_transaksi VALUES(
'',
'".$tgl_beli."',
'',
'',
'',
'".$status."',
'".$id_toko."',
'".$id_kasir."')";
$sql = mysqli_query($conn, $query);
if($sql){
	header("location: transaksi_aksi.php");
	}else{
		    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";    
			echo "<br><a href='pegawai.php'>Kembali Ke Form</a>";
	}
		}
?>
<?php if (isset($_POST['buatlaporan']))
		{ 
include "../koneksi.php";

$tgl_buat = $_POST['tgl_buat'];
$tgl_awal = $_POST['tgl_awal'];
$tgl_akhir = $_POST['tgl_akhir'];
$jml_uang = $_POST['jml_uang'];
$jml_modal = $_POST['jml_modal'];
$uang_keluar = $_POST['uang_keluar'];
$status = $_POST['status'];
$id_toko = $_POST['id_toko'];
$id_kasir = $_POST['id_kasir'];

$query = "INSERT INTO lap_tr VALUES(
'',
'".$tgl_buat."',
'".$tgl_awal."',
'".$tgl_akhir."',
'".$jml_uang."',
'".$jml_modal."',
'".$uang_keluar."',
'".$status."',
'".$id_toko."',
'".$id_kasir."')";
$sql = mysqli_query($conn, $query);
if($sql){
	header("location: pegawai_laporan.php");
	}else{
		    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";    
			echo "<br><a href='pegawai_laporan.php'>Kembali Ke Form</a>";
	}
		}
?>
<?php if (isset($_POST['batal_tr']))
		{ 
include "../koneksi.php";
$id_tr = $_POST['id_tr'];
$queryupdate = "update tb_transaksi set status ='BATAL' where id_tr = '".$id_tr."'";
$update = mysqli_query($conn, $queryupdate);
if($update){
	header("location: pegawai.php");
	}else{
		    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";    
			echo "<br><a href='transaksi_aksi.php'>Kembali Ke Form</a>";
	}
		}
?>
<?php if (isset($_POST['revisilap']))
		{ 
include "../koneksi.php";
$id_lap = $_POST['id_lap'];
$queryupdate = "update lap_tr set status ='TOLAK' where id_lap = '".$id_lap."'";
$update = mysqli_query($conn, $queryupdate);
if($update){
	header("location: lap_penjualan.php");
	}else{
		    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";    
			echo "<br><a href='lap_penjualan.php'>Kembali Ke Form</a>";
	}
		}
?>
<?php if (isset($_POST['barangbeli']))
{
include "../koneksi.php";
$id_transaksi = $_POST['id_tr'];
$id_barang = $_POST['id_barang'];
$jml_beli = $_POST['jml_beli'];
$id_toko = $_POST['id_toko'];
$adatr=mysqli_query($conn, "select * from tb_rinci_transaksi,tb_transaksi where tb_rinci_transaksi.id_brg='$id_barang' and tb_transaksi.id_toko='$id_toko' and tb_transaksi.id_tr=tb_rinci_transaksi.id_tr and tb_rinci_transaksi.id_tr= '$id_transaksi'");
$brg_ada=mysqli_fetch_array($adatr);
if($brg_ada > 0){
	$data2 = mysqli_fetch_assoc($adatr);
		$cekbarang=mysqli_query($conn, "select id_brg, nm_brg,hg_jl, sum(hg_jl * $jml_beli) as ttl from tb_barang where id_brg='$id_barang'");
		$barang=mysqli_fetch_array($cekbarang);
		$id_barang = $barang['id_brg'];
		$nm_brg = $barang['nm_brg'];
		$harga_brg = $barang['hg_jl'];
		$hrg_ttl = $barang['ttl'];
		$databaru=mysqli_query($conn, "select sum(jml + $jml_beli) as jmln, sum(hrg_jml + $hrg_ttl) as ttln from tb_rinci_transaksi where id_brg='$id_barang' and id_tr='$id_transaksi'");
		$baru=mysqli_fetch_array($databaru);
		$jml_beli_n = $baru['jmln'];
		$hrg_ttl_n = $baru['ttln'];
		$sisacek=mysqli_query($conn, "select sum(stok - $jml_beli) as sisa_stok from tb_barang where id_brg='$id_barang'");
		$sisa=mysqli_fetch_array($sisacek);
		$sisa_stok = $sisa['sisa_stok'];
		$queryupdate = "update tb_barang set stok ='".$sisa_stok."' where id_brg = '".$id_barang."'";
		$updatesbrg = mysqli_query($conn, $queryupdate);
		$updaterinci = "update tb_rinci_transaksi set jml='".$jml_beli_n."',hrg_jml='".$hrg_ttl_n."' where id_brg='$id_barang' and id_tr='$id_transaksi'";
		$rincianupdate = mysqli_query($conn, $updaterinci);
		header("location: transaksi_aksi.php");
	}else{			
include "../koneksi.php";
$id_transaksi = $_POST['id_tr'];
$id_barang = $_POST['id_barang'];
$jml_beli = $_POST['jml_beli'];
$stok=mysqli_query($conn, "select * from tb_barang where id_brg='$id_barang'");
$cekstok=mysqli_fetch_array($stok);
	if($cekstok['stok'] > "$jml_beli"){
	$data = mysqli_fetch_assoc($stok);
		$cekbarang=mysqli_query($conn, "select id_brg, nm_brg,hg_jl, sum(hg_jl * $jml_beli) as ttl from tb_barang where id_brg='$id_barang'");
		$barang=mysqli_fetch_array($cekbarang);
		$id_barang = $barang['id_brg'];
		$nm_brg = $barang['nm_brg'];
		$harga_brg = $barang['hg_jl'];
		$hrg_ttl = $barang['ttl'];
		$sisacek=mysqli_query($conn, "select sum(stok - $jml_beli) as sisa_stok from tb_barang where id_brg='$id_barang'");
		$sisa=mysqli_fetch_array($sisacek);
		$sisa_stok = $sisa['sisa_stok'];
$query = "INSERT INTO tb_rinci_transaksi VALUES(
'".$id_transaksi."',
'".$id_barang."',
'".$harga_brg."',
'".$jml_beli."',
'".$hrg_ttl."')";
$sql = mysqli_query($conn, $query);
if($sql){
	$queryupdate = "update tb_barang set stok ='".$sisa_stok."' where id_brg = '".$id_barang."'";
	$update = mysqli_query($conn, $queryupdate);
	header("location: transaksi_aksi.php");
	}else{
		header("location:transaksi_aksi.php?pesan1=gagal");
	}
	}else{
		header("location:transaksi_aksi.php?pesan=gagal");
	}

		}	
}
?>



<?php if (isset($_POST['updateData1']))
		{ 
include "../koneksi.php";
$username	= $_POST['username'];
$password	= $_POST['password'];
$nama		= $_POST['nama'];
$tanggal	= $_POST['tanggal'];
$bulan		= $_POST['bulan'];
$tahun		= $_POST['tahun'];
$tgl_lahir	= $tahun."-".$bulan."-".$tanggal;
$alamat		= $_POST['alamat'];
$kota		= $_POST['kota'];
$no_hp		= $_POST['no_hp'];
$jabatan	= $_POST['jabatan'];

// Cek apakah gambar berhasil diupload atau tidak  // Proses simpan ke Database

$queryedit = "UPDATE `tb_user` SET 
`password`='".$password."',
`nama`='".$nama."',
`tgl_lahir`='".$tgl_lahir."',
`alamat`='".$alamat."',
`kota`='".$kota."',
`jabatan`='".$jabatan."',
`no_hp`='".$no_hp."'
WHERE `username`='".$username."'";
$sqledit = mysqli_query($conn, $queryedit); // Eksekusi/ Jalankan query dari variabel $query
if($sqledit){
	header("location: user.php");
	}else{
		    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";    
			echo "<br><a href='user.php'>Kembali Ke Form</a>";
	}
		}
?>

<?php if (isset($_POST['deleetUsr']))
		{ 
include "../koneksi.php";
$username	= $_POST['username'];

// Cek apakah gambar berhasil diupload atau tidak  // Proses simpan ke Database

$queryhapus = "update `tb_user` set ket='tidak' WHERE `tb_user`.`username` = '".$username."'";
$sqlhapus = mysqli_query($conn, $queryhapus); // Eksekusi/ Jalankan query dari variabel $query
if($sqlhapus){
	header("location: user.php");
	}else{
		    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";    
			echo "<br><a href='user.php'>Kembali Ke Form</a>";
	}
		}
?>