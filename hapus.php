<?php 
    require 'fungsi.php';

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
