 <?php
	include('../koneksi.php');
	include('../session.php');
	$id_brg = $_GET['id_brg'];
	$result = mysqli_query($conn, "select tb_barang.id_brg as kb, tb_supplier.nm_supplier as nm_supplier, tb_supplier.id_supplier as id_supplier, tb_barang.nm_brg as nm_brg, tb_barang.stok as stok, tb_barang.harga_beli as hb, tb_barang.harga_jual as hj
								from tb_supplier, tb_barang where tb_barang.id_supplier=tb_supplier.id_supplier and id_brg='$id_brg'");
	$row = mysqli_fetch_array($result);
	?>
 <!-- EditMember Modal-->
 <div class="modal-dialog" role="document">
 	<div class="modal-content">
 		<div class="modal-header">
 			<h5 class="modal-title" id="myModalLabel">Ubah Data Barang</h5>
 			<button class="close" type="button" data-dismiss="modal" aria-label="Close">
 				<span aria-hidden="true">×</span>
 			</button>
 		</div>
 		<div class="modal-body">
 			<form action="sql_query.php" enctype="multipart/form-data" method="POST">
 				<fieldset>
 					<div class="input-group">
 						<input type="text" value="<?php echo date('Y-m-d'); ?>" name="tgl_so" hidden>
 					</div>
 					<label>Kode Barang</label>
 					<div class="input-group">
 						<input type="text" name="id_brg" readonly id="id_brg" value="<?php echo $row['kb']; ?>">
 					</div>
 					<label>Nama Supplier</label>
 					<div class="input-group">
 						<select class="custom-select" id="id_supplier" name="id_supplier">
 							<option value="<?php echo $row['id_supplier']; ?>"><?php echo $row['nm_supplier']; ?></option>
 							<?php
								$sql_tampil = "select * from tb_supplier";
								// Query untuk menampilkan semua data buku  
								$query_tampil = mysqli_query($conn, $sql_tampil);
								while ($data = mysqli_fetch_assoc($query_tampil)) {
								?>
 								<option value="<?php echo $data['id_supplier'] ?>"><?php echo $data['nm_supplier']; ?></option>
 							<?php

								}
								?>
 						</select>
 					</div>

 					<label>Nama Barang</label>
 					<div class="input-group">
 						<input type="text" name="nm_brg" id="nm_brg" placeholder="Nama Barang" value="<?php echo $row['nm_brg']; ?>">
 					</div>
 					<label>Stok</label>
 					<div class="input-group">
 						<input type="text" name="stok" id="stok" value="<?php echo $row['stok']; ?>">
 					</div>
 					<label>Harga Beli</label>
 					<div class="input-group">
 						<input type="text" name="harga_beli" id="harga_beli" value="<?php echo $row['hb']; ?>">
 					</div>
 					<label>Harga Jual</label>
 					<div class="input-group">
 						<input type="text" name="harga_jual" id="harga_jual" value="<?php echo $row['hj']; ?>">
 					</div>
 					<div class="modal-footer">
 						<button class="btn btn-primary fa" type="button" data-dismiss="modal"> Batal</button>
 						<button type="submit" name="updateBarang" id="updateBarang" class="btn btn-success fa fa-edit"> Ubah</button>
 						<button type="submit" name="deleetBarang" id="deleetBarang" class="btn btn-warning fa fa-trash-o"> Hapus</button>
 					</div>
 				</fieldset>
 			</form>
 		</div>
 		<div class="modal-footer">
 		</div>
 	</div>
 </div>