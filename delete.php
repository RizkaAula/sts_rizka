<?php
    require_once("database.php");
        $id = $_GET['id'];
        $sql = Delete("",$id);
        if ($sql) {
            header("location:data_barang.php");
        }else
        {
            echo"Hapus Gagal";
        }
?>