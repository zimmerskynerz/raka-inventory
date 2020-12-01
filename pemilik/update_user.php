 <?php
include('../koneksi.php');
include('../session.php'); 
$username = $_GET['username'];

$result=mysqli_query($conn, "select *, DATE_FORMAT(tgl_lahir, '%d %M %Y') as tgl_lahir2, right(tgl_lahir, 2) as tgl, mid(tgl_lahir,6,2) as bln,
LEFT(tgl_lahir, 4) as thn from tb_user where username='$username'");
$row=mysqli_fetch_array($result);
$nama_bulan = array("JANUARI","FEBRUARI","MARET","APRIL","MEI","JUNI","JULI",
												"AGUSTUS","SEPTEMBER","OKTOBER","NOVEMBER","DESEMBER");
?>
 
 <!-- EditMember Modal-->
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel">Ubah User Gudang!</h5>
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
					<input type="password" name="password" id="password" value="<?php echo $row['password']; ?>">
					</div>
					<label>Nama Pegawai</label>
					<div class="input-group">
					<input type="text" name="nama" id="nama" placeholder="Nama Pegawai" value="<?php echo $row['nama']; ?>">
					</div>
					<label>Tanggal Lahir</label>
					<div class="input-group">
					<select name="tanggal" id="tanggal">
												<option value="<?php echo $row['tgl'] ?>"><?php echo $row['tgl'] ?></option>
												<?php for($hari=1; $hari<=31; $hari++) {
												?>
													<option value="<?php echo $hari; ?>"><?php echo $hari; ?></option>
												<?php }
												?>
					</select>
					<select name="bulan" id="bulan">
												<option value="<?php echo $row['bln'] ?>"><?php echo $nama_bulan[$row['bln']-1] ?></option>
												<?php $nama_bulan = array("JANUARI","FEBRUARI","MARET","APRIL","MEI","JUNI","JULI",
												"AGUSTUS","SEPTEMBER","OKTOBER","NOVEMBER","DESEMBER");
												?>
																			
												<?php for($bulan=1; $bulan<=12; $bulan++) {
												?>
												<option value="<?php echo $bulan; ?>"><?php echo $nama_bulan[$bulan-1]; ?></option>
												<?php }
												?>
					</select>
					<select name="tahun" id="tahun">
												<option value="<?php echo $row['thn'] ?>"><?php echo $row['thn'] ?></option>
												<?php for($tahun=2000; $tahun>=1960; $tahun--) {
												?>
													<option value="<?php echo $tahun; ?>"><?php echo $tahun; ?></option>
												<?php }
												?>
					</select>
					</div>
					<label>Alamat</label>
					<div class="input-group">
					<textarea type="text" name="alamat" id="alamat"><?php echo $row['alamat']; ?></textarea>
					</div>
					<label>Kota</label>
					<div class="input-group">
					<input type="text" name="kota" id="kota" value="<?php echo $row['kota']; ?>">
					</div>
					<label>No Telp</label>
					<div class="input-group">
					<input type="text" name="no_hp" id="no_hp"value="<?php echo $row['no_hp']; ?>">
					</div>
					<label>Jabatan</label>
					<div class="input-group">
					<select name="jabatan" id="jabatan" width = "30px">
												<option value="<?php echo $row['jabatan'] ?>">Bagian <?php echo $row['jabatan'] ?></option>
												<option value="gudang">Bagian gudang</option>
												<option value="admin">Bagian admin</option>
												</select>
					</div>
					<div class="modal-footer">
        <button class="btn btn-primary fa" type="button" data-dismiss="modal"> Batal</button>
          <button type="submit" name="updateData1" id="updateData1" class="btn btn-success fa fa-edit"> Ubah</button>
		  <button type="submit" name="deleetUsr" id="deleetUsr" class="btn btn-warning fa fa-trash-o"> Hapus</button>
      </div>
					</fieldset>
        </form>
		</div>
        <div class="modal-footer">
        </div>
      </div>
    </div>