<?php 
include_once("config.php");
include "controllab.inc";
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

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item active">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Lab. Komputer dan Informatika</span>
        </a>
        <div id="collapsePages" class="collapse show" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="lab_informatika.php">Data Barang</a>
            <a class="collapse-item" href="order_data_informatika.php">Data Pemesanan</a>
            <a class="collapse-item active" href="pinjam_labinformatika_lab.php">Data Peminjaman</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - input -->
      <li class="nav-item">
        <a class="nav-link" href="simpan_informatika.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Simpan Data Barang</span></a>
      </li>

      <!-- Nav Item - order -->
      <li class="nav-item">
        <a class="nav-link" href="order_informatika.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Order Barang</span></a>
      </li>

      <!-- Nav Item - peminjaman -->
      <li class="nav-item">
        <a class="nav-link" href="peminjaman.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Tambah Peminjaman</span></a>
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
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Informatika</span>
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
          <h1 class="h3 mb-2 text-gray-800">TABEL DATA PEMINJAMAN ALAT</h1>
          
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Laboratorium Informatika</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID. Pinjam</th>
                      <th>No. Alat</th>
                      <th>Nama Alat</th>
                      <th>Nama Peminjam</th>
                      <th>Tanggal Peminjaman</th>
                      <th>Jam Peminjaman</th>
                      <th>Tanggal Harus Kembali</th>
                      <th>Tanggal Pengembalian</th>
                      <th>Jam Pengembalian</th>
                      <th>Kembalikan</th>
                    </tr>
                  </thead>
                  </tfoot>
                  
                  <tbody>
                  <?php
                  date_default_timezone_set('Asia/Jakarta');
                  $tglskrg = date('Y-m-d');
                  $no_alat = $_GET['no_alat'];
                  $sql=mysqli_query($koneksi, "SELECT * FROM alat INNER join peminjaman inner join mahasiswa WHERE alat.no_alat=peminjaman.no_alat and alat.no_alat='$no_alat' and peminjaman.nim=mahasiswa.nim");     
                  while ($data=mysqli_fetch_array($sql)) {
                  ?>
                    <tr>
                      <td><?php echo $data['id_pinjam']; ?></td>
                      <td><?php echo $data['no_alat']; ?></td>
                      <td><?php echo $data['nama_alat']; ?></td>
                      <td><?php echo $data['nama_mhs']; ?></td>
                      <td><?php echo $data['tgl_pinjam']; ?></td>
                      <td><?php echo $data['jam_pinjam']; ?></td>
                      <?php
                      if ($data['tgl_seharusnya'] == $tglskrg) {
                        ?><td style="color: red;"><?php echo $data['tgl_seharusnya']; ?></td>
                      <?php
                      }else{
                        ?><td><?php echo $data['tgl_seharusnya']; ?></td>
                      <?php
                      }
                      ?>
                      
                      <?php
                      if ($data['tgl_selesai'] == "0000-00-00") {
                        $tgl_selesai = "Belum Kembali";
                      } else{
                        $tgl_selesai = $data['tgl_selesai'];
                      }
                      ?>
                      <td><?php echo $tgl_selesai; ?></td>
                      <?php
                      if ($data['jam_selesai'] == "00:00:00") {
                        $jam_selesai = "Belum Kembali";
                      } else{
                        $jam_selesai = $data['jam_selesai'];
                      }
                      ?>
                      <td><?php echo $jam_selesai; ?></td>
                      <?php
                      if($data['kembali'] == "0"){
                      ?>
                        <td><a href="sistem_kembali.php?id_pinjam=<?php echo $data['id_pinjam']; ?>">
                          <button class="btn btn-primary">Kembalikan</button>
                          </a></td>
                      <?php
                      }else if ($data['kembali'] == "1") {
                      ?>
                      <td><a href="sistem_kembali.php?id_pinjam=<?php echo $data['id_pinjam']; ?>">
                          <button class="btn btn-primary" disabled>Kembalikan</button>
                          </a></td>
                          <?php
                      }
                      ?>
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

</body>

</html>