<?php 

   require 'fungsi.php';

   session_start();


    // sesion login
    if( !isset( $_SESSION["login"] ) ){
        header("Location:login.php");
        exit;
    }

   $id = $_GET["id"];

   $komentar = query("SELECT * FROM komentar WHERE id = $id")[0];

   if(isset( $_POST["kirim"] ) ){

    if( ganti($_POST) > 0){
        echo "<script>
                alert('Berhasil');
                document.location.href='index.php' 
                </script>";
    }else {
        echo "Gagal";
    }
    
   }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah | Komentar</title>
    <style>
*{
    margin: 0;
    padding: 0;
}

body{
    background-color: #ddd;
    font-family: sans-serif;
}

.contener{
    width: 25%;
    border-radius: 5px;
    background-color: white;
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    margin: 38px auto;
    padding: 30px;
}

.contener h1{
    text-align: center;
    margin-bottom: 30px;
}

form{
    font-size: 18px;
}

.panjang {
    width: 97%;
}

textarea{
    width: 98%;
    height: 100px;
}

.ukurangambar {
    width: 40%;
}
.tombol{
    width: 80px;
    margin: 10px auto;
    box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;
}

button{
    width: 80px;
    height: 30px;
    background-color: green;
    color: white;
    
}


    </style>

</head>

<body>
    <div class="contener">
        <h1>Masukan komentar</h1>
        <!-- input -->
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $komentar["id"] ;?>">
            <input type="hidden" name="gambarlama" value="<?= $komentar["gambar"] ?>" >

            <label for="nama"> Nama </label><br>
            <input type="text" name="nama" id="nama" class="panjang" required  value="<?= $komentar["nama"] ?>"><br><br>

            <label for="komentar">Komentar</label><br>
            <textarea name="komentar" id="komentar" required ></textarea><br><br>

            <label for="gambar">Gambar</label><br>
            <img src="img/<?= $komentar["gambar"] ?>" class="ukurangambar" >
            <input type="file" name="gambar" id="gambar"><br><br>
            
            <div class="tombol"><button type="kirim" name="kirim">Kirim</button></div>

        </form> 
    </div>
</body>
</html>