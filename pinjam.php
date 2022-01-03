<?php 
include_once("config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Aset AE</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link type="text/css"  href="bootstrap-datepicker/css/bootstrap-datepicker.css"  rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
        </div>
        <div class="sidebar-brand-text mx-3">Aset AE</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      <?php 
      $id_lab = $_GET['id_lab'];
      $sql3=mysqli_query($koneksi, "select * from laboratorium");
      while ($data3=mysqli_fetch_array($sql3)) {
              ?>
        <li class="nav-item">
        <a class="nav-link" href="pinjam_laboratorium.php?id_lab=<?php echo $data3['id_lab']; ?>">
          <i class="fas fa-fw fa-table"></i>
          <span>Lab. <?=$data3['nama_lab'];?></span></a>
        </li>
        <?php }?>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

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
          

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">PINJAM BARANG</h1>
          
          <?php
            $no_alat = $_GET['no_alat'];
            $sql=mysqli_query($koneksi, "select * from alat inner join simpan where alat.id_pesan=simpan.id_pesan and alat.no_alat='$no_alat'");
            $data=mysqli_fetch_array($sql);
          ?>

          <!-- DataTales Example -->
          <form class="form-horizontal" action="sistem_pinjam.php?id_lab=<?php echo $data['id_lab']; ?>&no_alat=<?php echo $data['no_alat']; ?>" method="post">
            <div class="form-group">
              <label class="control-label col-sm-2" for="id_lab">Id. Lab:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="id_lab" id="id_lab" placeholder="Id. Laboratorium" value="<?php echo $data['id_lab'] ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="no_alat">No. Alat:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="no_alat" id="no_alat" placeholder="No. Alat" value="<?php echo $data['no_alat'] ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="no_alat">Nama Alat:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="nama_alat" id="nama_alat" placeholder="Nama Alat" value="<?php echo $data['nama_alat'] ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="nim">NIM:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="nim" placeholder="Nomor Induk Mahasiswa" name="nim" required>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="nama_keperluan">Keperluan</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="nama_keperluan" placeholder="Nama Keperluan" name="nama_keperluan" required>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button class="btn btn-primary">Pinjam Alat</button></td>
            </div>
          </form>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Teknologi Otomasi Manufaktur dan Mekatronika</span>
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
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="index.php">Logout</a>
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

  <script src="jquery/jquery-2.2.1.js"></script>
  <script src="bootstrap/js/bootstrap.js"></script>
  <script src="bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

  <script type="text/javascript">
   $(function(){
    $(".date").datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true,
    });
   });
  </script>

</body>

</html>
