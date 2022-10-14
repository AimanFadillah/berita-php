<?php 
    require 'fungsi.php';
    session_start();


    // sesion login
    if( !isset( $_SESSION["login"] ) ){
        header("Location:login.php");
        exit;
    }


    $komentar = query("SELECT * FROM komentar");

    if( isset($_POST["cari"]) ){
        $komentar = cari($_POST["keyword"]);
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita</title>




    
<style>
    *{
    margin: 0;
    padding: 0;
}

body{
    background-color: #ddd;
    margin: 50px;
    font-family: sans-serif;
}

.contener{
    width: 70%;
    margin: 0px auto;
    background-color: white;
    padding: 20px;
    border-radius: 5px;
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
}

.gambar-1{
    width: 100%;
    height: 300px;
    margin-top: 15px;
    margin-bottom: 20px;
    background-image: url('img/sepakbola.jpg');
    background-size: cover;
    background-repeat: no-repeat;
    background-position: 0px -140px;
}

navbar{
    display: flex;
    justify-content: space-between;
    align-items: center;
}

navbar ul li{
    margin-right: 5px;
    display: inline-block;
    padding: 10px;
    background-color: #ddd;
    box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
}

.pencarian{
    background: none;
    box-shadow: none;
}

navbar ul li a{
    text-decoration: none;
    color: black;
}



input.cari-in{
    border: none;
    border-bottom: 1px solid black;
}


input.cari-in[type="text"]:focus{
    border: none;
    outline: none;
    border-bottom: 1px solid black;
}

.komentar{
    background-color: #ddd;
    box-sizing: border-box;
    padding: 10px;
    margin-top: 10px;
    margin-bottom: 10px;
    box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
}



.item-none{
    display: flex;
}

.item-hapus{
    display: flex;
    
}

.item-hapus a{
    text-decoration: none;
    background-color: #aaa;
    color: black;
    padding: 5px;
    margin-right: 5px;
    box-sizing: border-box;
}

.foto-komentar{
    width: 5%;
    margin-right: 8px;
}

.nama-komentar{
    display: flex;
    justify-content: space-between;
}

.dalam-komentar{
    padding-top: 10px;
}

</style>




</head>

<body>
    <div class="contener">
        <h1>Komentar Sebuah Foto</h1>
       
    <div class="gambar-1"></div>
    <!-- navbar -->
    <navbar>

         <form action="" method="POST"  class="pencarian">
            <input type="text" name="keyword" id="keyword" class="cari-in"
            placeholder=" Cari Komentar..." autofocus autocomplete="off">
            <button type="submit" name="cari" id="cari">Searcing</button>
        </form>

        <ul>


            <li class="tambah"><a href="insert.php" class="menambahkan">Tambah Komentar</a></li>
            <li><a href="logout.php" class="menambahkan">Logout</a></li>

        </ul>
    </navbar>

    <!-- isi komentar -->
<div class="jarak" id="komentar">
    <?php foreach ( $komentar as $komen ) : ?>
    
    <div class="komentar">
        <div class="nama-komentar">
            <div class="item-none">
                <img src="img/<?= $komen["gambar"]; ?> "  alt="gambar" class="foto-komentar">
                <h2><?= $komen["nama"]; ?></h2>
            </div>

            <div class="item-hapus">
                <a href="hapus.php?id=<?= $komen["id"]; ?>" class="hapus" onclick="return confirm('yakin?')";>Hapus</a>
                <a href="ganti.php?id=<?= $komen["id"] ?>">Ganti</a>
            </div>
            
        </div>
        <div class="dalam-komentar"><p><?= $komen["komentar"]; ?></p></div><br><br>
    </div>

  
    <?php endforeach ; ?>
</div>

</div>    


    <script src="JS/script.js"></script>
</body>

</html>