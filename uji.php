<?php 

 password_hash(123,PASSWORD_DEFAULT);

$jawab = "panda";

$hashed = '$2y$10$dVO5WYtJ1R44Vd7BNJcr0.x1/iEB8sRiCVNTCBMFhqY
';

if (password_verify($jawab, $hashed)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}

?>