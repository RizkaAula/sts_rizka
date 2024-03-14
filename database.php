<?php

    // membuat koneksi ke database
    define ('DB_HOST', 'localhost');
    define ('DB_USER', 'root');
    define ('DB_PASS', '');
    define ('DB_NAME', 'sts_rizka');
    $conn=mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die("Gagal terhubung dengan Database: " . mysqli_error($dbconnect));

    function query($query)
    {
        global $conn;
        $result=mysqli_query($conn,$query);
        $rows=[];
        while($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }
    // menambah barang baru
    if(isset($_POST['addnewbarang'])){
        $kode_brg = $_POST['kode_brg'];
        $nama_brg = $_POST['nama_brg'];
        $kategori = $_POST['kategori'];
        $merk = $_POST['merk'];
        $jumlah = $_POST['jumlah'];

        $addtotable = mysqli_query($conn, "INSERT INTO barang (kode_brg, nama_brg, kategori, merk, jumlah) values('$kode_brg','$nama_brg','$kategori','$merk','$jumlah')");
        if($addtotable){
            header('location:index.php');
        }else{
            echo 'gagal';
            header('location:index.php');
        }
    };

    // Menambah barang masuk
    function inputdata($inputdata)
    {
        global $conn;
        $sql=mysqli_query($conn,$inputdata);
        return $sql;
    }

    // untuk mengecek login
    function cek_login($username, $password) {
        global $conn;
        $uname = $username;
        $upass = $password;

        $hasil = mysqli_query($conn, "SELECT * FROM user WHERE username='$uname' and password='$upass'");
        $sql = mysqli_num_rows($hasil);
        if ($sql > 0) {
            $query = mysqli_fetch_array($hasil);
            $_SESSION['username'] = $query['username'];
            $_SESSION['role'] = $query['role'];
            return true;
        } else {
            return false;
        }
    }

    // Mengedit Data Barang
    function Editdata($data,$id)
    {
        global $conn;
        $hasil=mysqli_query($conn ,"SELECT * FROM $data WHERE id='$id'");
        return $hasil;
    }

?>