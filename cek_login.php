<?php
if (isset($_POST['login']))
		{ 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include 'koneksi.php';
 
// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];
 
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($conn,"select * from tb_user where username='$username' and password='$password' and ket='ada'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
 
	// cek jika user login sebagai admin
	if($data['jabatan']=="admin"){
 
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['jabatan'] = "admin";
		// alihkan ke halaman dashboard admin
		header("location:admin/index.php");
 
	// cek jika user login sebagai pegawai
	}else if($data['jabatan']=="gudang"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['jabatan'] = "gudang";
		// alihkan ke halaman dashboard pegawai
		header("location:gudang/index.php");
 
	// cek jika user login sebagai pengurus
	}else if($data['jabatan']=="pemilik"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['jabatan'] = "pemilik";
		// alihkan ke halaman dashboard pengurus
		header("location:pemilik/index.php");
 
	}else{
 
		// alihkan ke halaman login kembali
		header("location:index.php?pesan=gagal");
	}	
}else{
	header("location:index.php?pesan=gagal");
}
		}
?>