<?php
include('../koneksi.php');
include('../session.php');

$result = mysqli_query($conn, "select *, DATE_FORMAT(tgl_lahir, '%d %M %Y') as tgl_lahir from tb_user where username='$session_id'") or die('Error In Session');
$row = mysqli_fetch_array($result);
$tgl_akhir	= $_POST['tgl_akhir'];
$tgl_awal	= $_POST['tgl_awal'];
$result2 = mysqli_query($conn, "select sum(rinci_masuk.harga * rinci_masuk.jml ) as ttl
								from tb_masuk, rinci_masuk
								where tb_masuk.id_masuk=rinci_masuk.id_masuk and tgl_masuk between '$tgl_awal' and '$tgl_akhir'");
$row2 = mysqli_fetch_array($result2);
$result3 = mysqli_query($conn, "select sum(rinci_keluar.harga * rinci_keluar.jml ) as ttl
								from tb_keluar, rinci_keluar
								where tb_keluar.id_keluar=rinci_keluar.id_keluar and tgl_keluar between '$tgl_awal' and '$tgl_akhir'");
$row3 = mysqli_fetch_array($result3);
?>

<script language=javascript>
	function printWindow() {
		bV = parseInt(navigator.appVersion);
		if (bV >= 4) window.print();
	}
	printWindow();
</script>
<table align="center">
	<thead>
		<tr>
			<th><a style="font-family: arial; font-size: 26px; padding-top: 10px; padding-bottom: 10px" colspan="2">LAPORAN BULANAN</a><br>
				<a style="font-family: arial; font-size: 26px; padding-top: 10px; padding-bottom: 10px" colspan="2">BEE DIGITAL PRINTING</a><br>
				<a style="font-family: arial; font-size: 10px; padding-top: 10px; padding-bottom: 10px" colspan="2">Bakalan Krapyak RT 07 RW 03 No.7 Kec Kaliwungu Kab. Kudus</a>
			</th>
		</tr>
		<tr>
			<td colspan="2">
				<a style="font-family: arial;  padding-top: 10px; padding-bottom: 10px" colspan="2">=============================================================================</a><br>
				<a style="font-family: arial;  padding-top: 10px; padding-bottom: 10px" colspan="2">LAPORAN BARANG MASUK; Pembayaran Rp <?php echo $row2['ttl']; ?>,- :</a>
			</td>
		</tr>
	</thead>
	<tbody>
		<table align="center" width="730">
			<tr>
				<th><i class="fa fa-truck"></i> Kode Masuk</th>
				<th><i class="fa fa-tags"></i> Kode Barang</th>
				<th><i class="fa fa-bookmark"></i> Tanggal Masuk</th>
				<th><i class=" fa fa-archive"></i> Harga</th>
				<th><i class=" fa fa-archive"></i> Jumlah</th>
				<th><i class=" fa fa-edit"></i> Staff</th>
				<th></th>
			</tr>
			<?php

			$sql_tampil = "select tb_masuk.id_masuk as id_masuk, DATE_FORMAT(tb_masuk.tgl_masuk, '%d %M %Y') as tgl_masuk,
								rinci_masuk.id_brg as id_brg, rinci_masuk.jml as jml, tb_masuk.username as username,  rinci_masuk.harga as harga
								from tb_masuk, rinci_masuk
								where tb_masuk.id_masuk=rinci_masuk.id_masuk and tgl_masuk between '$tgl_awal' and '$tgl_akhir'";
			// Query untuk menampilkan semua data buku  
			$query_tampil = mysqli_query($conn, $sql_tampil);
			while ($data = mysqli_fetch_assoc($query_tampil)) {
			?>
				<tr>
					<td align="center"><?php echo $data['id_masuk'] ?></td>
					<td align="center"><?php echo $data['id_brg'] ?></td>
					<td align="center"><?php echo $data['tgl_masuk'] ?></td>
					<td align="center"><?php echo $data['harga'] ?></td>
					<td align="center"><?php echo $data['jml'] ?></td>
					<td align="center"><?php echo $data['username'] ?></td>
				</tr>
			<?php

			}
			?>
			</tr>
		</table>
		<table align="center">
			<thead>
				<tr>
					<td colspan="2">
						<a style="font-family: arial;  padding-top: 10px; padding-bottom: 10px" colspan="2">=============================================================================</a>
						<br><a style="font-family: arial;  padding-top: 10px; padding-bottom: 10px" colspan="2">LAPORAN BARANG KELUAR; Pendapatan Rp <?php echo $row3['ttl']; ?>,- :</a>
					</td>
				</tr>
				<tr>
					<table align="center" width="730">
						<tr>
							<th><i class="fa fa-truck"></i> Kode Keluar</th>
							<th><i class="fa fa-tags"></i> Kode Barang</th>
							<th><i class="fa fa-bookmark"></i> Tanggal Keluar</th>
							<th><i class=" fa fa-archive"></i> Harga</th>
							<th><i class=" fa fa-archive"></i> Jumlah</th>
							<th><i class=" fa fa-edit"></i> Staff</th>
							<th></th>
						</tr>
						<?php

						$sql_tampil = "select tb_keluar.id_keluar as id_keluar, DATE_FORMAT(tb_keluar.tgl_keluar, '%d %M %Y') as tgl_keluar,
								rinci_keluar.id_brg as id_brg, rinci_keluar.jml as jml, tb_keluar.username as username,  rinci_keluar.harga as harga
								from tb_keluar, rinci_keluar
								where tb_keluar.id_keluar=rinci_keluar.id_keluar and tgl_keluar between '$tgl_awal' and '$tgl_akhir'";
						// Query untuk menampilkan semua data buku  
						$query_tampil = mysqli_query($conn, $sql_tampil);
						while ($data = mysqli_fetch_assoc($query_tampil)) {
						?>
							<tr>
								<td align="center"><?php echo $data['id_keluar'] ?></td>
								<td align="center"><?php echo $data['id_brg'] ?></td>
								<td align="center"><?php echo $data['tgl_keluar'] ?></td>
								<td align="center"><?php echo $data['harga'] ?></td>
								<td align="center"><?php echo $data['jml'] ?></td>
								<td align="center"><?php echo $data['username'] ?></td>
							</tr>
						<?php

						}
						?>
				</tr>
		</table>
		</tr>
		<table align="center">
			<thead>
				<tr>
					<td colspan="2">
						<a style="font-family: arial;  padding-top: 10px; padding-bottom: 10px" colspan="2">=============================================================================</a>
						<br><a style="font-family: arial;  padding-top: 10px; padding-bottom: 10px" colspan="2">LAPORAN GUDANG; LABA YANG DITERIMA : Rp <?php echo $row3['ttl'] - $row2['ttl']; ?></a>
					</td>
				</tr>
				<tr>
					<table align="center" width="730">
						<thead>
							<tr>
								<th><i class="fa fa-truck"></i> Kode Barang</th>
								<th><i class="fa fa-truck"></i> Nama Supplier</th>
								<th><i class="fa fa-tags"></i> Nama Barang</th>
								<th><i class="fa fa-bookmark"></i> Stok</th>
								<th><i class=" fa fa-archive"></i> Harga Beli</th>
								<th><i class=" fa fa-archive"></i> Harga Jual</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php
							$sql_tampil = "select tb_barang.id_brg as id_brg, tb_supplier.nm_supplier as nm_supplier, tb_barang.nm_brg as nm_brg, tb_barang.stok as stok,tb_barang.harga_beli as hb, tb_barang.harga_jual as hj
								from tb_supplier, tb_barang where tb_barang.id_supplier=tb_supplier.id_supplier";
							// Query untuk menampilkan semua data buku  
							$query_tampil = mysqli_query($conn, $sql_tampil);
							while ($data = mysqli_fetch_assoc($query_tampil)) {
							?>
								<tr>
									<td align="center"><?php echo $data['id_brg'] ?></td>
									<td align="center"><?php echo $data['nm_supplier'] ?></td>
									<td align="center"><?php echo $data['nm_brg'] ?></td>

									<td align="center"><?php echo $data['stok'] ?></td>
									<td align="center"><?php echo $data['hb'] ?>,-</td>
									<td align="center"><?php echo $data['hj'] ?>,-</td>
								</tr>
							<?php

							}
							?>
				</tr>
		</table>
</table>
</table>