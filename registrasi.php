<?php 

   require 'fungsi.php';

   if(isset ($_POST["register"]) ){

    if( registrasi($_POST) ){
        echo "<script>
                alert('USER BARU'); 
                </script>";
    }else {
        echo mysqli_error($conn);
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
    height: 400px;
    border-radius: 5px;
    background-color: white;
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    margin: 100px auto;
    padding: 30px;
   
}

.contener h1{
    text-align: center;
    margin-bottom: 30px;
}

form{
    font-size: 18px;
}

.panjang{
    width: 100%;
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
        <h1>Registrasi</h1>
        <!-- input -->
        <form action="" method="POST" >

            <label for="nama">Nama</label><br>
            <input type="text" name="nama" id="nama" class="panjang" required autocomplete="off"><br><br>

            <label for="nama">Password</label><br>
            <input type="password" name="password" id="password" class="panjang" required autocomplete="off"><br><br>

            <label for="nama">Konfirmasi Password</label><br>
            <input type="password" name="password2" id="password2" class="panjang" required autocomplete="off"><br><br>

            <button type="submit" name="register">Registrasi</button>
        </form> 
    </div>
</body>
</html>