<?php 
include_once("config.php");
session_start();
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

</head>

<body id="page-top">

<?php 
  $id_lab = $_SESSION['id_lab'];
  $sql=mysqli_query($koneksi, "select * from laboratorium where id_lab=$id_lab");
  $data=mysqli_fetch_array($sql);
?>
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="laboratorium.php">
        <div class="sidebar-brand-icon rotate-n-15">
        </div>
        <div class="sidebar-brand-text mx-3">Aset AE</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Lab. <?=$data['nama_lab'];?></span>
        </a>
        <div id="collapsePages" class="collapse show" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="laboratorium.php">Data Barang</a>
            <a class="collapse-item" href="order_data.php">Data Pemesanan</a>
            <?php
              $id_lab = $_SESSION['id_lab'];
              $sql=mysqli_query($koneksi, "select * from alat where id_lab=$id_lab group by kode_alat");
              $data3=mysqli_fetch_array($sql);
            ?>
            <a class="collapse-item" href="pinjam_laboratorium_lab.php?id_lab=<?php echo $data3['id_lab']; ?>&nama_alat=<?php echo $data3['nama_alat']; ?>">Data Peminjaman</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - input -->
      <li class="nav-item">
        <a class="nav-link" href="simpan.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Simpan Data Barang</span></a>
      </li>

      <!-- Nav Item - order -->
      <li class="nav-item">
        <a class="nav-link" href="order.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Order Barang</span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link active" href="tambah_barang.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Tambah Data Barang</span></a>
      </li>

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
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?=$data['nama_lab'];?></span>
                <img class="img-profile rounded-circle" src="img/Black.png">
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

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">TAMBAH ALAT</h1>
          
          <!-- DataTales Example -->
          <form class="form-horizontal" action="sistem_tambah.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
            <?php
              $id_lab = $_SESSION['id_lab'];
            ?>
              <label class="control-label col-sm-2" for="jenis_alat">Jenis Alat:</label>
              <div class="col-sm-10">
              <select class="form-control" id="jenis" name="id_jenis"> 
              <option value="">Pilih Jenis Alat</option>
                <?php 
                $sql=mysqli_query($koneksi, "select * from jenisalat where id_lab=$id_lab");
                while($row=mysqli_fetch_array($sql))
                { ?>
                <option value="<?php echo $row['id_jenis'];?>"><?php echo $row['jenis_alat'];?></option>
                <?php
                } ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="nama_alat">Nama Alat:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="nama_alat" id="nama_alat" placeholder="Nama Alat" required>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="warna">Warna:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="warna" id="warna" placeholder="Warna" required>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="ukuran">Ukuran (cm):</label>
              <div class="col-sm-10">
                <input type="number"  min="0" oninput="validity.valid||(value='');" class="form-control" id="ukuran" placeholder="Ukuran" name="ukuran" required>
              </div>
            </div>
            <div class="form-group">
                <div id="msg"></div>
                <div class="col-sm-10">
                <input type="file" name="gambar" class="file" >
                </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div></div>
          </form>
          </div>

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
          <a class="btn btn-primary" href="logout.php">Logout</a>
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

</body>

</html>

<script>

    function konfirmasi(){
        konfirmasi=confirm("Apakah anda yakin ingin menghapus gambar ini?")
        document.writeln(konfirmasi)
    }

    $(document).on("click", "#pilih_gambar", function() {
    var file = $(this).parents().find(".file");
    file.trigger("click");
    });

    $('input[type="file"]').change(function(e) {
    var fileName = e.target.files[0].name;
    $("#file").val(fileName);

    var reader = new FileReader();
    reader.onload = function(e) {
        // get loaded data and render thumbnail.
        document.getElementById("preview").src = e.target.result;
    };
    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
    });
</script>