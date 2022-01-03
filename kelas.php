<?php 
include_once("config.php");
include "control.inc";
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
$sql3=mysqli_query($koneksi, "select * from user where level='admin' limit 1");
$data3=mysqli_fetch_array($sql3);
?>
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="kelas_1aea.php">
        <div class="sidebar-brand-icon rotate-n-15">
        </div>
        <div class="sidebar-brand-text mx-3">Aset AE</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item active">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Kelas</span>
        </a>
        <div id="collapsePages" class="collapse show" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
          <?php 
          $sql=mysqli_query($koneksi, "select * from mahasiswa limit 1");
          while ($data=mysqli_fetch_array($sql)) {
                  ?>
            <a class="collapse-item" href="kelas.php?kelas=<?php echo $data['kelas']; ?>">Kelas <?=$data['kelas'];?></a>
            <?php }?>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link"  href="tambah_mhs.php">
          <i class="fas fa-fw fa-plus"></i>
          <span>Tambah Mahasiswa</span>
        </a>
      </li>

      <!-- Nav Item - input -->
      <li class="nav-item">
        <a class="nav-link" href="data_kalab.php?id_user=<?=$data3['id_user'];?>">
          <i class="fas fa-fw fa-table"></i>
          <span>Data Ka.lab</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link"  href="tambah_kalab.php">
          <i class="fas fa-fw fa-plus"></i>
          <span>Tambah Ka.Lab</span>
        </a>
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
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?=$data3['nama'];?></span>
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
          <h1 class="h3 mb-2 text-gray-800">DATA MAHASISWA</h1>
          
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
            <?php 
              $sql2=mysqli_query($koneksi, "select * from mahasiswa limit 1");
              $data2=mysqli_fetch_array($sql2);
              $kelas = $data2['kelas'];
            ?>
              <h6 class="m-0 font-weight-bold text-primary">Kelas <?=$kelas;?></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <a href="tambah_mhs.php"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah Data Mahasiswa</a>
              <div class="dropdown-divider"></div>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>NIM</th>
                      <th>Nama Mahasiswa</th>
                      <th>No. Koin</th>
                      <th>Kelas</th>
                      <th>Status</th>
                      <th>Edit/Hapus</th>
                    </tr>
                  </thead>
                  </tfoot>
                  
                  <tbody>
                  <?php
                  $sql=mysqli_query($koneksi, "select * from mahasiswa where kelas='$kelas'");
                  while ($data=mysqli_fetch_array($sql))
                  {
                  ?>
                    <tr>
                      <td><?php echo $data['nim']; ?></td>
                      <td><?php echo $data['nama_mhs']; ?></td>
                      <td><?php echo $data['no_koin']; ?></td>
                      <td><?php echo $data['kelas']; ?></td>
                      <td><?php echo $data['status']; ?></td>
                      <td><a href="edit_mhs.php?nim=<?php echo $data['nim']; ?>">
                          <button class="btn btn-primary"><i class='fas fa-edit'></i></button>
                          </a>
                          <a href="hapus_mhs.php?nim=<?php echo $data['nim']; ?>">
                          <button class="btn btn-primary"><i class='fas fa-trash'></i></button>
                          </a>
                      </td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Teknik Otomasi Manufaktur dan Mekatronika</span>
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