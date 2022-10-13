<?php 

$conn = mysqli_connect("localhost","root","","berita");

function query($query){
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($tambah){
   
        global $conn;
        $nama = htmlspecialchars($tambah["nama"]);
        $komentar = htmlspecialchars($tambah["komentar"]);

        $gambar = upload();

        if(!$gambar ){
            return false;
        }

        $data = "INSERT INTO komentar 
                    VALUES(
                    '',
                    '$nama',
                    '$komentar',
                    '$gambar'
                    )";
    

        mysqli_query($conn,$data);


    return mysqli_affected_rows($conn);

    }

function hapus($data){
    global $conn;
    mysqli_query($conn,"DELETE FROM komentar WHERE id = $data ");
    return mysqli_affected_rows($conn);
}

function ganti($ganti){
    global $conn;
    $id = $ganti["id"];
    $nama = htmlspecialchars($ganti["nama"]);
    $komentar = htmlspecialchars($ganti["komentar"]);
    $gambarlama = htmlspecialchars($ganti["gambarlama"]);

    if( $_FILES['gambar']['error'] === 4){
        $gambar = $gambarlama;

    }else {
        $gambar = upload();
    }


    $data = "UPDATE komentar SET 
    nama = '$nama',
    komentar = '$komentar',
    gambar = '$gambar'
    WHERE id = $id
    ";


    mysqli_query($conn,$data);


return mysqli_affected_rows($conn);

}

function cari($keyword){
   $query = "SELECT * FROM komentar
                WHERE 
            nama LIKE '%$keyword%' OR
            komentar LIKE '%$keyword%' 
            
            ";
    return query($query);
}

function upload(){
    $namafile = $_FILES["gambar"]["name"];
    $tmp_name = $_FILES["gambar"]["tmp_name"];
    $error = $_FILES["gambar"]["error"];
    $size = $_FILES["gambar"]["size"];

    // cek jika tidak ada gambar diupload

    if($error === 4){
        echo "<script>
        alert('wajib mengisi gambar');
        </script>";
        return false;
    }

    // cek jika yang diupload bukan gambar

    $cek_gambar_valid = ['jpg','jpeg','png'];
    $cek_gambar = explode('.',$namafile);
    $cek_gambar = strtolower(end($cek_gambar));

    if(!in_array ($cek_gambar,$cek_gambar_valid) ){
        echo "<script>
        alert('yang anda upload bukan gambar 😒');
        </script>";
        return false;
    }

    if($size > 10000000){
        echo "<script>
        alert('gambar terlalu besar 😒');
        </script>";
        return false;
    }

    $namafilebaru = uniqid();
    $namafilebaru .= ".";
    $namafilebaru = $cek_gambar;

    move_uploaded_file($tmp_name,"img/".$namafile);

    return $namafile;
}

function registrasi($data){
global $conn;

$nama_user = strtolower( (stripslashes( $data["nama"] ) ) );
$password = mysqli_real_escape_string($conn,$data["password"] );
$password2 = $data["password2"];

$result = mysqli_query($conn,"SELECT nama FROM user WHERE nama = '$nama_user' ");

if(mysqli_fetch_assoc( $result ) ){
    echo "<script>
    alert('Nama Sudah ada')
    </script>";
    return false;
}


if( $password !== $password2){
    echo "<script>
    alert('GAGAL')
    </script>";
    return false;
}

$password = password_hash($password,PASSWORD_DEFAULT);

mysqli_query($conn,"INSERT INTO user VALUES ('','$nama_user','$password') ");

return mysqli_affected_rows($conn);

}

?>