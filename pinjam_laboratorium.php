<?php 
include_once("config.php");
error_reporting(0);
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

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
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

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">TABEL DATA ALAT</h1>
          
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
            <?php
              $sql3=mysqli_query($koneksi, "select * from laboratorium where id_lab=$id_lab");
              $data3=mysqli_fetch_array($sql3);
            ?>
              <h6 class="m-0 font-weight-bold text-primary">Laboratorium <?=$data3['nama_lab'];?></h6>
            </div>
            <div class="card-body">
            <ul class="nav nav-tabs">
              <?php 
              $id_lab = $_GET['id_lab'];
              $sql=mysqli_query($koneksi, "select * from alat inner join jenisalat where alat.id_jenis=jenisalat.id_jenis and alat.id_lab=jenisalat.id_lab and alat.id_lab=$id_lab group by alat.kode_alat");
              while ($data3=mysqli_fetch_array($sql)) {
              ?>
              <li class="nav-item dropdown">
              <a class="nav-link active dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><?=$data3['jenis_alat'];?></a>
                <div class="dropdown-menu">
                  <?php 
                  $id_lab = $_GET['id_lab'];
                  $sql=mysqli_query($koneksi, "select * from alat where id_lab=$id_lab group by kode_alat");
                  while ($data3=mysqli_fetch_array($sql)) {
                  ?>
                  <a class="dropdown-item" href="pinjam_laboratorium.php?id_lab=<?php echo $data3['id_lab']; ?>&nama_alat=<?php echo $data3['nama_alat']; ?>"><?=$data3['nama_alat'];?></a>
                  <?php } ?>
                </div>
              </li>
              <?php } ?>
            </ul>
            <br>
            <?php
                $id_lab = $_GET['id_lab'];
                $nama_alat = $_GET['nama_alat'];
                $alat = mysqli_query($koneksi,"SELECT * FROM masteralat WHERE nama_alat='$nama_alat' and id_lab=$id_lab");
                $data=mysqli_fetch_array($alat);
            ?>
            <div><img style="height: 200px;" src=<?php echo "'img/upload/"; echo $data['foto']; echo "'"?>></div>
            <div>Warna Barang : <?php echo $data['warna'];?></div>
            <div>Ukuran Barang : <?php echo $data['ukuran'];?> cm</div>
            <br>
            <?php
            $id_lab = $_GET['id_lab'];
            $sql=mysqli_query($koneksi, "select * from alat where id_lab=$id_lab group by kode_alat");
            $data3=mysqli_fetch_array($sql);
            $nama_alat = $_GET['nama_alat'];
            $jumlah_alat = mysqli_query($koneksi,"SELECT COUNT( * ) AS jumlahalat FROM alat inner join simpan WHERE alat.nama_alat='$nama_alat' and alat.id_lab=$id_lab and alat.status_alat='Ada' and simpan.id_pesan = alat.id_pesan");
            $jml_alat = mysqli_fetch_assoc($jumlah_alat);
            $hasil_fetch_x = $jml_alat['jumlahalat'];
            ?>
            <h6 class="m-0 font-weight-bold text-primary">Jumlah Komputer Tersedia: <?php 
              echo $hasil_fetch_x;
              ?></h6><br>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No. Alat</th>
                      <th>Nama Alat</th>
                      <th>Status Pinjam</th>
                      <th>Pinjam</th>
                      <th>History Peminjaman</th>
                    </tr>
                  </thead>
                  </tfoot>
                  
                  <tbody>
                  <?php
                  $id_lab = $_GET['id_lab'];
                  $nama_alat = $_GET['nama_alat'];
                  $sql=mysqli_query($koneksi, "select * from alat inner join simpan where alat.id_pesan=simpan.id_pesan and simpan.id_lab=$id_lab and alat.nama_alat='$nama_alat'");     
                  while ($data=mysqli_fetch_array($sql)) {
                  ?>
                    <tr>
                      <td><?php echo $data['no_alat']; ?></td>
                      <td><?php echo $data['nama_alat']; ?></td>
                      <td><?php echo $data['status_alat']; ?></td>
                      <?php
                      if($data['status_alat'] == "Dipinjam"){
                      ?>
                        <td><a href="pinjam.php?id_lab=<?php echo $data['id_lab']; ?>&no_alat=<?php echo $data['no_alat']; ?>">
                          <button class="btn btn-primary" disabled>Pinjam</button>
                          </a></td>
                      <?php
                      }else if ($data['status_alat'] == "Ada") {
                      ?>
                      <td><a href="pinjam.php?id_lab=<?php echo $data['id_lab']; ?>&no_alat=<?php echo $data['no_alat']; ?>">
                          <button class="btn btn-primary">Pinjam</button>
                          </a></td>
                          <?php
                      }
                      ?>
                      
                      <td><a href="history.php?id_lab=<?php echo $data['id_lab']; ?>&no_alat=<?php echo $data['no_alat']; ?>">
                          <button class="btn btn-primary">History</button>
                          </a></td>
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

</body>

</html>