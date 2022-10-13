<?php 
    require 'fungsi.php';

    session_start();


    // sesion login
    if( !isset( $_SESSION["login"] ) ){
        header("Location:login.php");
        exit;
    }

    $id = $_GET["id"];

    if( hapus($id) > 0 ){
        echo "<script>
                alert('Berhasil');
                document.location.href='index.php' 
        </script>";
    }else {
        echo "gagal";
    }


?>
