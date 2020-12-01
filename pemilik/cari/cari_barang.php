<?php
include('../../koneksi.php');
$id_brg = $_POST['id_brg']; 
$result=mysqli_query($conn, "select id_brg, harga, stok from tb_barang where id_brg='$id_brg'");
$row=mysqli_fetch_array($result);
echo json_encode($row);
                            ?>

							