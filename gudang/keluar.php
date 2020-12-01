<?php
include('../koneksi.php');
include('../session.php');

$result=mysqli_query($conn, "select * from tb_user where username='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);


?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>HALAMAN GUDANG</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
       
        <div class="sidebar-brand-text mx-3"><?php echo "<td align='left'>".$row['username']."</td>"; ?><sup></sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Menu Gudang
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
	  <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-book"></i>
          <span>Menu Barang</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
			<a class="collapse-item" href="masuk.php">Data Barang Masuk</a>
			<a class="collapse-item" href="keluar.php">Data Barang Keluar</a>
          </div>
        </div>
      </li>

	  
      <!-- Nav Item - Utilities Collapse Menu -->



      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
  

      <!-- Divider -->
      

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

       

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            

            <!-- Nav Item - Alerts -->
            

            
              <!-- Dropdown - Messages -->
            <div class="topbar-divider d-none d-sm-block"></div>

           <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo "<td align='left'>".$row['nama']."</td>"; ?></span>
                <img class="img-profile rounded-circle" src="data:image/png;base64,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">
              </a>
              <!-- Dropdown - User Information -->
			  
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading --> <!-- Page Heading -->
		  <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Menu Barang Keluar</h1>
            <a href="#" name="profile" data-toggle="modal" data-target="#barangKeluar" class="btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Barang Keluar</a>
          </div>
          <!-- DataTales Barang Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Barang Keluar</h6>
            </div>
			<div id="editUsrModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			</div>
			<div id="hapusBarangModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			</div>
		<div id="cetakMemberModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        </div>

		
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
					<th><i class="fa fa-truck"></i> Kode Keluar</th>
                    <th><i class="fa fa-truck"></i> Kode Barang</th>
                    <th><i class="fa fa-tags"></i> Tanggal Keluar</th>
					<th><i class="fa fa-tags"></i> Jumlah</th>
                    <th><i class="fa fa-bookmark"></i> Status</th>
					<th><i class=" fa fa-edit"></i> Staff</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                                $sql_tampil = "select tb_keluar.id_keluar as id_keluar, DATE_FORMAT(tb_keluar.tgl_keluar, '%d %M %Y') as tgl_keluar,
								rinci_keluar.id_brg as id_brg, rinci_keluar.jml as jml, tb_keluar.username as username, tb_keluar.status as status
								from tb_keluar, rinci_keluar
								where tb_keluar.id_keluar=rinci_keluar.id_keluar";
								// Query untuk menampilkan semua data buku  
								$query_tampil = mysqli_query($conn, $sql_tampil);
								while($data = mysqli_fetch_assoc($query_tampil)){
                            ?>
                            <tr>
								<td><?php echo $data['id_keluar'] ?></td>
                                <td><?php echo $data['id_brg'] ?></td>
                                <td><?php echo $data['tgl_keluar'] ?></td>
								<td><?php echo $data['jml'] ?></td>
                                <td><?php echo $data['status'] ?></td>	
								<td><?php echo $data['username'] ?></td>									
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
  <div class="modal fade" id="barangKeluar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data Barang Keluar!</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
		<form action="sql_query.php" enctype="multipart/form-data" method="POST">
		<fieldset>
					<div class="input-group">
					<input type="text" name="tgl_keluar" id="tgl_keluar" value="<?php $tgl=date('Y-m-d'); Echo $tgl; ?>" hidden>
					</div>
					<div class="input-group">
					<input type="text" name="username" id="username" value="<?php echo $row['username'] ?>" hidden>
					</div>
					<label>Keterangan</label>
					<div class="input-group">
						<select name="status" id="status">
					<option>---- Pilih Status ----</option>
					<option value="terjual">Barang Terjual</option>
					<option value="return">Barang Return</option>
						</select>
					</div>
					<div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button type="submit" name="tambahKeluar" id="tambahKeluar" class="btn btn-success">Simpan</button>
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
		
		      <script type="text/javascript">
            $(document).ready(function (){
                $(".open_modal").click(function (e){
                    var m = $(this).attr("id");
                    $.ajax({
                        url: "update_user.php",
                        type: "GET",
                        data : {username: m,},
                        success: function (ajaxData){
                            $("#editUsrModal").html(ajaxData);
                            $("#editUsrModal").modal('show',{backdrop: 'true'});
                        }
                    });
                });
            });
        </script>
</body>

</html>
