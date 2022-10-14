<?php

use LDAP\Result;

    require '../fungsi.php';
    $keyword = $_GET["keyword"];
    $query = "SELECT * FROM komentar
                WHERE 
            nama LIKE '%$keyword%' OR
            komentar LIKE '%$keyword%' 
            ";
    $komentar = query($query);

?>

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
  

  
  




