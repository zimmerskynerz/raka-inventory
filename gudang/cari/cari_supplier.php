<?php
include('../../koneksi.php');

$id_supplier = $_POST['id_supplier']; 

$result=mysqli_query($conn, "select * from tb_supplier where id_supplier='$id_supplier'");
$row=mysqli_fetch_array($result);
echo json_encode($row);
                            ?>

							