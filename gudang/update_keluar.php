 <?php
include('../koneksi.php');
include('../session.php'); 
$id_brg = $_GET['id_brg'];

$result2=mysqli_query($conn, "select * from tb_keluar where username='$session_id' and ket='belum' order by id_keluar desc limit 1");
$row2=mysqli_fetch_array($result2);

$id_keluar = $row2['id_keluar'];

$result=mysqli_query($conn, "select *, sum(jml * harga) as ttl from rinci_keluar where id_brg='$id_brg' and id_keluar='$id_keluar'");
$row=mysqli_fetch_array($result);
?>
 
 <!-- EditMember Modal-->
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel">Ubah Barang Keluar</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
		<form action="sql_query.php" enctype="multipart/form-data" method="POST">
		<fieldset>
					<div class="input-group">
					<input type="text" name="id_keluar" id="id_keluar" value="<?php echo $row2['id_keluar'] ?>" hidden>
					</div>
					<label> Kode Barang </label>
					<div class="input-group">
					<input type="text" name="id_brg" id="id_brg" value="<?php echo $row['id_brg'] ?>" readonly>
					</div>
					<label> Jumlah </label>
					<div class="input-group">
					<input type="text" name="jml" id="jml" onkeyup="sum();" value="<?php echo $row['jml'] ?>">
					</div>
					<label> Harga </label>
					<div class="input-group">
					<input type="text" name="harga" id="harga" onkeyup="sum();" value="<?php echo $row['harga'] ?>">
					</div>
					<script>
					function sum() {
					var txtFirstNumberValue = document.getElementById('harga').value;
					var txtSecondNumberValue = document.getElementById('jml').value;
					var result1 = parseInt(txtSecondNumberValue) * parseInt(txtFirstNumberValue);
					if (!isNaN(result1)) {
					document.getElementById('total_hrg').value = result1;
					}
						}
					</script>
					<label> Jumlah Harga </label>
					<div class="input-group">
					<input type="text" name="total_hrg" id="total_hrg" value="<?php echo $row['ttl'] ?>" readonly>
					</div>
					<div class="modal-footer">
        <button class="btn btn-primary fa" type="button" data-dismiss="modal"> Batal</button>
          <button type="submit" name="editBrgKeluar" id="editBrgKeluar" class="btn btn-success fa fa-edit"> Ubah</button>
		  <button type="submit" name="hapusBrgKeluar" id="hapusBrgKeluar" class="btn btn-warning fa fa-trash-o"> Hapus</button>
      </div>
					</fieldset>
        </form>
		</div>
        <div class="modal-footer">
        </div>
      </div>
    </div>