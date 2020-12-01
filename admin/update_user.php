 <?php
include('../koneksi.php');
include('../session.php'); 
$username = $_GET['username'];

$result=mysqli_query($conn, "select * from tb_user where jabatan='gudang' and username='$username'");
$row=mysqli_fetch_array($result);
?>
 
 <!-- EditMember Modal-->
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel">Update User Gudang!</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
		<form action="sql_query.php" enctype="multipart/form-data" method="POST">
		<fieldset>
					<label>Username</label>
					<div class="input-group">
					<input type="text" name="username" id="username" value="<?php echo $row['username']; ?>" readonly>
					</div>
					<label>Password</label>
					<div class="input-group">
					<input type="password" name="pass" id="pass" value="<?php echo $row['password']; ?>">
					</div>
					<label>Nama Pegawai</label>
					<div class="input-group">
					<input type="text" name="nama" id="nama" placeholder="Nama Pegawai" value="<?php echo $row['nama']; ?>">
					</div>
					<label>Tanggal Lahir</label>
					<div class="input-group">
					<input type="date" name="tgl_lahir" id="tgl_lahir" value="<?php echo $row['tgl_lahir']; ?>">
					</div>
					<label>Alamat</label>
					<div class="input-group">
					<textarea type="text" name="alamat" id="alamat" placeholder="Alamat Pegawai"><?php echo $row['alamat']; ?></textarea>
					</div>
					<label>Kota</label>
					<div class="input-group">
					<input type="text" name="kota" id="kota" placeholder="Kota / Kabupaten" value="<?php echo $row['kota']; ?>">
					</div>
					<label>No Telp</label>
					<div class="input-group">
					<input type="text" name="no_hp" id="no_hp" placeholder="No Telepon" value="<?php echo $row['no_hp']; ?>">
					</div>
					<div class="modal-footer">
        <button class="btn btn-primary fa" type="button" data-dismiss="modal"> Cancel</button>
          <button type="submit" name="updateData" id="updateData" class="btn btn-success fa fa-edit"> Update</button>
		  <button type="submit" name="deleetUsr" id="deleetUsr" class="btn btn-warning fa fa-trash-o"> Delete</button>
      </div>
					</fieldset>
        </form>
		</div>
        <div class="modal-footer">
        </div>
      </div>
    </div>