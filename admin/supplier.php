<?php
include('../koneksi.php');
include('../session.php');

$result = mysqli_query($conn, "select * from tb_user where username='$session_id'") or die('Error In Session');
$row = mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html lang="en">

<?php include('include/head.php') ?>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include('include/sidebar.php') ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include('include/nav_bar.php') ?>
        <!-- End of Topbar -->
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Menu Kelola Supplier</h1>
            <a href="#" name="profile" data-toggle="modal" data-target="#dataSupplier" class="btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Tambah Supplier</a>
          </div>

          <!-- DataTales Barang Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Supplier</h6>
            </div>
            <div id="editSuppModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th><i class="fa fa-truck"></i> Kode Supplier</th>
                      <th><i class="fa fa-tags"></i> Nama Supplier</th>
                      <th><i class="fa fa-bookmark"></i> Alamat Supplier</th>
                      <th><i class=" fa fa-archive"></i> Telepon</th>
                      <th><i class="fa fa-edit"></i> Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql_tampil = "select * from tb_supplier where ket='ada'";
                    // Query untuk menampilkan semua data buku  
                    $query_tampil = mysqli_query($conn, $sql_tampil);
                    while ($data = mysqli_fetch_assoc($query_tampil)) {
                    ?>
                      <tr>
                        <td align="center"><?php echo $data['id_supplier'] ?></td>
                        <td><?php echo $data['nm_supplier'] ?></td>
                        <td>
                          <p><?php echo $data['alamat'] ?>, <?php echo $data['kota'] ?></p>
                        </td>
                        <td><?php echo $data['no_hp'] ?></td>
                        <td>
                          <a id="detail_supplier" href="javascript:void(0);" class="bs-tooltip" data-toggle="modal" data-target="#supplier_detail" data-placement="top" title="" data-original-title="Detail" data-id_supplier="<?= $data['id_supplier'] ?>" data-kota="<?= $data['kota'] ?>" data-nm_supplier="<?= $data['nm_supplier'] ?>" data-alamat="<?= $data['alamat'] ?>" data-no_hp="<?= $data['no_hp'] ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                              <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                              <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                            </svg>
                          </a>
                        </td>
                      </tr>
                    <?php

                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- DataTales Kategori Example -->
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Sudah siap pergi?</h5>
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
  <div class="modal fade" id="dataSupplier" tabindex="-1" role="dialog" aria-labelledby="dataSupplierLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="dataSupplierLabel">Tambah Supplier</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
              <line x1="18" y1="6" x2="6" y2="18"></line>
              <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
          </button>
        </div>
        <div class="modal-body">
          <form action="sql_query.php" enctype="multipart/form-data" method="POST">
            <div class="form-group mb-4">
              <label>Nama Supplier</label>
              <input type="text" class="form-control" id="nm_supplier" name="nm_supplier" placeholder="Nama Supplier" required>
            </div>
            <div class="form-group mb-4">
              <label>Alamat</label>
              <textarea type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Supplier" required></textarea>
            </div>
            <div class="form-group mb-4">
              <label>Kota Supplier</label>
              <input type="text" class="form-control" id="kota" name="kota" placeholder="Kota Supplier" required>
            </div>
            <div class="form-group mb-4">
              <label>No HP</label>
              <input type="number" class="form-control" id="no_hp" name="no_hp" placeholder="No HP Supplier" required>
            </div>
        </div>
        <div class="modal-footer">
          <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Keluar</button>
          <button type="submit" class="btn btn-primary" id="tambahSupplier" name="tambahSupplier"> Simpan</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <!-- editData Modal-->
  <div class="modal fade" id="updateDataSupplier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Data Barang</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="sql_query.php" enctype="multipart/form-data" method="POST">
            <fieldset>
              <label>Kode Supplier</label>
              <div class="input-group">
                <input type="text" id="id_supplier" onkeyup="isi_otomatis_barang()" name="id_supplier">
              </div>
              <label>Nama Supplier</label>
              <div class="input-group">
                <input type="text" id="nm_supplier" name="nm_supplier">
              </div>
              <label>Alamat Supplier</label>
              <div class="input-group">
                <textarea type="text" name="alamat" id="alamat" placeholder="Alamat Supplier"></textarea>
              </div>
              <label>Kota</label>
              <div class="input-group">
                <input type="text" id="kota" name="kota">
              </div>
              <label>Link</label>
              <div class="input-group">
                <input type="text" id="no_hp" name="no_hp">
              </div>
              <label>Link</label>
              <div class="input-group">
                <input type="text" id="link" name="link">
              </div>
              <div class="modal-footer">
                <button class="btn btn-primary fa" type="button" data-dismiss="modal"> Cancel</button>
                <button type="submit" name="updateSupplier" id="updateSupplier" class="btn btn-success fa fa-edit"> Ubah</button>
                <button type="submit" name="deleetSupplier" id="deleetSupplier" class="btn btn-warning fa fa-trash-o"> Delete</button>
              </div>
            </fieldset>
          </form>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

  <div class="modal fade" id="supplier_detail" tabindex="-1" role="dialog" aria-labelledby="supplier_detailLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="supplier_detailLabel">Detail Data Supplier</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
              <line x1="18" y1="6" x2="6" y2="18"></line>
              <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
          </button>
        </div>
        <div class="modal-body" id="detail_body">
          <form action="sql_query.php" enctype="multipart/form-data" method="POST">
            <div class="form-group mb-4">
              <label>Nama Supplier</label>
              <input type="text" class="form-control" id="nm_supplier" name="nm_supplier" placeholder="Nama Supplier" required>
              <input type="text" class="form-control" id="id_supplier" name="id_supplier" placeholder="Nama Supplier" hidden>
            </div>
            <div class="form-group mb-4">
              <label>Alamat</label>
              <textarea type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Supplier" required></textarea>
            </div>
            <div class="form-group mb-4">
              <label>No HP</label>
              <input type="text" class="form-control" id="kota" name="kota" placeholder="Kota Supplier" required>
            </div>
            <div class="form-group mb-4">
              <label>No HP</label>
              <input type="number" class="form-control" id="no_hp" name="no_hp" placeholder="No HP Supplier" required>
            </div>
        </div>
        <div class="modal-footer">
          <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Keluar</button>
          <button type="submit" name="updateSupplier" id="updateSupplier" class="btn btn-success fa fa-edit"> Ubah</button>
          <button type="submit" name="deleetSupplier" id="deleetSupplier" class="btn btn-warning fa fa-trash-o"> Hapus</button>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
    <script type="text/javascript">
      $(document).on("click", "#detail_supplier", function() {
        var id_supplier = $(this).data('id_supplier');
        var nm_supplier = $(this).data('nm_supplier');
        var alamat = $(this).data('alamat');
        var kota = $(this).data('kota');
        var no_hp = $(this).data('no_hp');
        $(".modal-body#detail_body #id_supplier").val(id_supplier);
        $(".modal-body#detail_body #nm_supplier").val(nm_supplier);
        $(".modal-body#detail_body #alamat").val(alamat);
        $(".modal-body#detail_body #kota").val(kota);
        $(".modal-body#detail_body #no_hp").val(no_hp);
      })
    </script>
</body>

</html>