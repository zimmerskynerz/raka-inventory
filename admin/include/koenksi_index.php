<?php
include('../koneksi.php');
include('../session.php');

$result = mysqli_query($conn, "select *, DATE_FORMAT(tgl_lahir, '%d %M %Y') as tgl_lahir2, right(tgl_lahir, 2) as tgl, mid(tgl_lahir,6,2) as bln,
LEFT(tgl_lahir, 4) as thn from tb_user where username='$session_id'") or die('Error In Session');
$row = mysqli_fetch_array($result);
$nama_bulan = array(
"JANUARI", "FEBRUARI", "MARET", "APRIL", "MEI", "JUNI", "JULI",
"AGUSTUS", "SEPTEMBER", "OKTOBER", "NOVEMBER", "DESEMBER"
);
