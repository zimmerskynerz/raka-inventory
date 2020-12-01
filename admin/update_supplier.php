<?php
include('../koneksi.php');
include('../session.php'); 
$id_supplier = $_GET['id_supplier'];
$result=mysqli_query($conn, "select * from tb_supplier where id_supplier='$id_supplier'");
$row=mysqli_fetch_array($result);
?>
 
 <!-- EditMember Modal-->
    