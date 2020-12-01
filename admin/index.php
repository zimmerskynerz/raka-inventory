<?php include('include/koenksi_index.php') ?>

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
                        <h1 class="h3 mb-0 text-gray-800">Data Diri Admin</h1>
                    </div>
                    <!-- DataTales Barang Example -->
                    <div class="container-fluid">
                        <div class="row mt">
                            <div class="col-lg-12">
                                <div class="row content-panel">
                                    <div class="col-md-4 profile-text mt mb centered">
                                        <div class="right-divider hidden-sm hidden-xs">
                                            <h4><?php echo $row['kota'] ?>, <?php echo $row['tgl_lahir2'] ?></h4>
                                            <h6>Tempat, Tanggal Lahir</h6>
                                            <h4><?php echo $row['jabatan'] ?></h4>
                                            <h6>Jabatan</h6>
                                            <h4><?php echo $row['no_hp'] ?></h4>
                                            <h6>No Telepon</h6>
                                        </div>
                                    </div>

                                    <div class="col-md-4 profile-text">
                                        <h3><?php echo $row['nama'] ?></h3>
                                        <h6><?php echo $row['jabatan'] ?></h6>
                                        <p><?php echo $row['alamat'] ?>, <?php echo $row['kota'] ?></p>
                                        <br>
                                        <ul class="nav pull-right top-menu">
                                            <div>
                                                <li><a class="fa fa-edit logout" href="#" name="profile" data-toggle="modal" data-target="#dataUsr"> Edit Data Diri</a></li>
                                            </div>
                                        </ul>
                                    </div>
                                    <!-- DataTales Kategori Example -->
                                </div>
                                <!-- /.container-fluid -->

                            </div>
                            <!-- End of Main Content -->

                            <!-- Footer -->
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
                    <?php include('modal/index.php') ?>

                    <?php include('include/footer_index.php') ?>
</body>

</html>