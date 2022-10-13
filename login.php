<?php 
    require 'fungsi.php';
  
    if(isset ($_POST["login"] ) ) {

        $nama_user = $_POST["nama"];
        $password_user = $_POST["password"];


        $result = mysqli_query($conn," SELECT * FROM user WHERE nama = '$nama_user' ");

        

        if( mysqli_num_rows( $result ) === 1 ){

            $row = mysqli_fetch_assoc($result);

            // var_dump (password_verify($password , $row["password"] ) );
            if (password_verify($password_user,$row["password"])) {
                header("Location: index.php");exit();
            }


        }

        $error = true;

    }

    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login | Komentar</title>
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
    height: 300px;
    border-radius: 5px;
    background-color: white;
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    margin: 150px auto;
    padding: 30px;
    padding-top: 40px;
}

.contener h1{
    text-align: center;
    margin-bottom: 30px;
}

.perigatan{
    color: red;
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
        <h1>Login</h1>

      
        <!-- input -->
        <form action="" method="POST" >

            <label for="nama">Nama</label><br>
            <input type="text" name="nama" id="nama" class="panjang" required autocomplete="off"><br><br>

            <label for="nama">Password</label><br>
            <input type="password" name="password" id="password" class="panjang" required autocomplete="off">
            <?php if(isset($error) ) : ?>
            <p class="perigatan">Password / Username salah</p>
            <?php endif; ?>
                <br><br>
            <div class="tombol"><button type="submit" name="login">Login</button></div>
        </form> 
    </div>
</body>
</html>