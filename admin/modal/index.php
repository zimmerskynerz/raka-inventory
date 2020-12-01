<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Apakah yakin ingin keluar?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="../index.php">LOG OUT</a>
            </div>
        </div>
    </div>
</div>

<!-- dataSupplier Modal-->
<div class="modal fade" id="dataUsr" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Diri!</h5>
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
                                <?php for ($hari = 1; $hari <= 31; $hari++) {
                                ?>
                                    <option value="<?php echo $hari; ?>"><?php echo $hari; ?></option>
                                <?php }
                                ?>
                            </select>
                            <select name="bulan" id="bulan">
                                <option value="<?php echo $row['bln'] ?>"><?php echo $nama_bulan[$row['bln'] - 1] ?></option>
                                <?php $nama_bulan = array(
                                    "JANUARI", "FEBRUARI", "MARET", "APRIL", "MEI", "JUNI", "JULI",
                                    "AGUSTUS", "SEPTEMBER", "OKTOBER", "NOVEMBER", "DESEMBER"
                                );
                                ?>

                                <?php for ($bulan = 1; $bulan <= 12; $bulan++) {
                                ?>
                                    <option value="<?php echo $bulan; ?>"><?php echo $nama_bulan[$bulan - 1]; ?></option>
                                <?php }
                                ?>
                            </select>
                            <select name="tahun" id="tahun">
                                <option value="<?php echo $row['thn'] ?>"><?php echo $row['thn'] ?></option>
                                <?php for ($tahun = 2000; $tahun >= 1960; $tahun--) {
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
                            <input type="text" name="no_hp" id="no_hp" value="<?php echo $row['no_hp']; ?>">
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <button type="submit" name="editDataN" id="editDataN" class="btn btn-success">Edit</button>
                        </div>
                    </fieldset>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>