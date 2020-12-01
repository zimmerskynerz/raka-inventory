		<?php
include('../koneksi.php');
$id_barang = $_GET['id_barang'];
$result8=mysqli_query($conn, "select * from tb_barang where id_barang='".$id_barang."'");
$row8=mysqli_fetch_array($result8);
?>
 <!-- EditMember Modal-->
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel">Hapus Karyawan Toko</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
		<form action="aksi_hapusgudang.php" enctype="multipart/form-data" method="POST" id="form-edit">
		<fieldset>
					<label>ID MEMBER</label>
					<div class="input-group">
						<input type="text" value="<?php echo $row8['id_barang']; ?>" name="id_mt" readonly> 
					</div>
					<label>Nama Barang</label>
					<div class="input-group">
					<input type="tex" value="<?php echo $row8['nm_brg']; ?>" name="nm_brg" readonly>
					</div>
					<label>Harga Beli</label>
					<div class="input-group">
						<input type="text" value="<?php echo $row8['harga_beli']; ?>" name="hb" readonly> 
					</div>
					<label>Harga Jual</label>
					<div class="input-group">
						<input type="text" value="<?php echo $row8['harga_jual']; ?>" name="hj" readonly> 
					</div>
						<div class="input-group">
						<input type="text" value="blokir" name="status" hidden> 
					</div>
					<div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-success">Hapus</button>
      </div>
					</fieldset>
        </form>
		
		
		
		
		</div>
        <div class="modal-footer">
		
          
        </div>
      </div>
    </div>