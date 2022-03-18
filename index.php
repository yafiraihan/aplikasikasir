<?php

require 'function.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>data pemesanan</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">Aplikasi Kasir</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">menu</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Order
                            </a>
                            <a class="nav-link" href="stock.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Stock Barang
                            </a>
                            <a class="nav-link" href="masuk.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Barang Masuk
                            </a>
                            <a class="nav-link" href="pelanggan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Pelangan
                            </a>
                            <a class="nav-link" href="logout.php">
                                logout
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Data Pemesanan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">selamat datang</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">jumlah pesanan</div>
                                   
                                </div>
                            </div>
                        </div>

                        <!-- Buttom to open the modal -->                        
                        <button type="button" class="btn btn-info mb-4" data-bs-toggle="modal" data-bs-target="#myModal">
                                Tambah pesanan baru
                              </button>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               data pemesanan 
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>ID Pesanan</th>
                                            <th>Tanggal</th>
                                            <th>nama pelanggan</th>
                                            <th>jumlah</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $get=mysqli_query($c,"select * from pesanan p, pelanggan pl where p.idpelanggan=pl.
                                    idpelanggan");
                                   

                                    while($p=mysqli_fetch_array($get)){
                                        $idorder=$p['idorder'];
                                        $tanggal=$p['tanggal'];
                                        $namapelanggan=$p['namapelanggan'];
                                        $alamat=$p['alamat'];
                                    ?>

                                        <tr>
                                            <td><?=$i++;?></td>
                                            <td><?=$idorder;?></td>
                                            <td><?=$tanggal;?></td>
                                            <td><?=$namapelanggan;?></td> - <?=$alamat;?></td>
                                            <td>Jumlah</td>
                                            <td><a href="view.php?idp=<?=$idorder;?>" class="btn btn-primary"
                                            target="blank"> tampilkan</a> Delete</td>
                                        </tr>
                                     
                                    <?php

                                    }; //end of while

                                     ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
    
    <!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">tambah pesanan</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <form method="post">

      <!-- Modal body -->
      <div class="modal-body">
          Pilih Pelanggan
          <select name="idpelanggan" class="form-control" >
          
          <?php 
          $getpelanggan = mysqli_query($c,"select * from pelanggan");

          while($pl=mysqli_fetch_array($getpelanggan)){
              $namapelanggan = $pl['namapelanggan'];
              $idpelanggan = $pl['idpelanggan'];
              $alamat = $pl['alamat'];


            ?>
            <option value = "<?=$idpelanggan;?>"><?=$namapelanggan;?> - <?=$alamat;?></option>

            <?php
          }
            ?>


          </select>
        
        </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      <button type="submit" class="btn btn-success" nama="tambahpesanan">submit</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

</form>

    </div>
  </div>
</div>


</html>
