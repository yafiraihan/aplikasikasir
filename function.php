<?php

session_start();

//bikin koneksi
$c = mysqli_connect('localhost','root','','kasir');

//login
if(isset($_POST['login'])){
    //initiate variabel
    $username = $_POST['username'];
    $password = $_POST['password'];

    $check = mysqli_query($c,"SELECT * FROM user WHERE username='$username' and password= '$password'");
    $hitung = mysqli_num_rows($check);

    if($hitung>0){
        //jika datanya ditemukan
        //berhasil login

        $_SESSION['login']='True';
        header('location:index.php');
    } else {
        //data tidak ditemukan 
        //gagal total
       echo '<script>alert("username atau password salah")
        window.location.href="login.php"
        </script>
      ';
    }
    
}


 if(isset($_POST['namaproduk'])){
     $namaproduk=$_POST['namaproduk'];
     $deskripsi=$_POST['deskripsi'];
     $stock=$_POST['stock'];
     $harga=$_POST['harga'];

     $insert = mysqli_query($c,"insert into produk (namaproduk,deskripsi,harga,stock) values
     ('$namaproduk','$deskripsi','$harga','$stock')");

     if($insert){
         header('location:stock.php');
     } else {
        echo '<script>alert("gagal menambah barang baru");
        window.location.href="stock.php"
        </script>
      '; 
     }

}




if(isset($_POST['namapelanggan'])){

     $namapelanggan=$_POST['namapelanggan'];
     $notelpon=$_POST['notelpon'];
     $alamat=$_POST['alamat'];

     $insert = mysqli_query($c,"insert into pelanggan (namapelanggan,notelpon,alamat) values
     ('$namapelanggan','$notelpon','$alamat')");

     if($insert){
         header('location:pelanggan.php');
     } else {
        echo '<script>alert("gagal menambah pelanggan baru");
        window.location.href="pelanggan.php"
        </script>
      '; 
     }

}

if(isset($_POST['tambahpesanan'])){
    $idpelanggan = $_POST['idpelanggan'];

    $insert = mysqli_query($c,"insert into pesanan (idpelanggan) values ('$idpelanggan')");
    

    if($insert){
        header('location:index.php');
    } else {
       echo '<script>alert("gagal menambah pesanan baru");
       window.location.href="index.php"
       </script>
     '; 
    }

}



if(isset($_POST['addtambah'])){
    $idpelanggan = $_POST['idproduk'];
    $idp = $_POST['idp'];
    $qty = $_POST['qty']; //jumlah

    $insert = mysqli_query($c,"insert into detailpesanan (idpesanan,idproduk,qty) values ('$idp','$idproduk','$qty')");
    

    if($insert){
        header('location:index.php');
    } else {
       echo '<script>alert("gagal menambah pesanan baru");
       window.location.href="index.php"
       </script>
     '; 
    }

}




?>