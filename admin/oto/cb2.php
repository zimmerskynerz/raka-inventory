<?php
include('../../koneksi.php');
include('../../session.php'); 

$id_supplier = $_POST['id_supplier']; // Menerima NPM dari JQuery Ajax dari form

$result12=mysqli_query($conn, "select max(id_brg) as id_brg from tb_barang where id_supplier='$id_supplier'");
$row12=mysqli_fetch_array($result12);
$kode = substr($row12['id_brg'],3,6);
$kode_brg=$kode.+1;
$masukan=$id_supplier.$kode_brg;
echo json_encode($masukan);
                            ?>

							