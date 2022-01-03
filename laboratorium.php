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
      <li class="nav-item active">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Lab. <?=$data['nama_lab'];?></span>
        </a>
        <div id="collapsePages" class="collapse show" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item active" href="laboratorium.php">Data Barang</a>
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

      <li class="nav-item">
        <a class="nav-link" href="tambah_barang.php">
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
          <h1 class="h3 mb-2 text-gray-800">DATA ASET</h1>
          
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Laboratorium <?=$data['nama_lab'];?></h6>
            </div>
            <?php
              $nama_lab = $data['nama_lab'];
              $sql2=mysqli_query($koneksi, "SELECT total_anggaran FROM laboratorium WHERE id_lab = $id_lab");
              $data2=mysqli_fetch_array($sql2);

              $anggaran = $data2['total_anggaran'];

              
            ?>

            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Total Anggaran: <?php function rupiah($angka){
                
                $hasil_rupiah = "Rp" . number_format($angka,0,',','.');
                return $hasil_rupiah;
               
              } 
              echo rupiah($anggaran);
              ?></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No. Alat</th>
                      <th>Nama Alat</th>
                      <th>Berat Alat (gram)</th>
                      <th>Harga Alat</th>
                      <th>Keberadaan Alat</th>
                      <th>Tanggal Simpan</th>
                      <th>Cetak QR</th>
                      <th>Edit/Hapus</th>
                    </tr>
                  </thead>
                  </tfoot>
                  
                  <tbody>
                  <?php
                  $sql3=mysqli_query($koneksi, "select * from alat inner join simpan where alat.id_pesan=simpan.id_pesan and simpan.id_lab=$id_lab");
                  
                      function rupiah2($angka2){
                        
                        $hasil_rupiah2 = "Rp" . number_format($angka2,0,',','.');
                        return $hasil_rupiah2;
                       
                      } 
                  while ($data3=mysqli_fetch_array($sql3)) {
                  ?>
                    <tr>
                      <td><?php echo $data3['no_alat']; ?></td>
                      <td><?php echo $data3['nama_alat']; ?></td>
                      <td><?php echo $data3['berat_alat']; ?></td>
                      <td><?php 
                      $angka2 = $data3['harga_alat'];
                      echo rupiah2($angka2);?></td>
                      <td><?php echo $data3['status_alat']; ?></td>
                      <td><?php echo $data3['tgl_simpan']; ?></td>
                      <td><a href="cetakqr_kecil.php?no_alat=<?php echo $data3['no_alat']; ?>">
                          <button class="btn btn-primary">Kecil</button>
                          </a><br>&nbsp;
                          <a href="cetakqr.php?no_alat=<?php echo $data3['no_alat']; ?>">
                          <button class="btn btn-primary">Sedang</button>
                          </a><br><br>
                          <a href="cetakqr_besar.php?no_alat=<?php echo $data3['no_alat']; ?>">
                          <button class="btn btn-primary">Besar</button>
                          </a>
                      </td>
                      <td><a href="edit.php?no_alat=<?php echo $data3['no_alat']; ?>">
                          <button class="btn btn-primary"><i class='fas fa-edit'></i></button>
                          </a>
                          <a href="hapus.php?no_alat=<?php echo $data3['no_alat']; ?>">
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