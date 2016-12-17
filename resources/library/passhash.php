<?php
function hashpass($password){
    $options = [
      'cost' => 11,
      'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
    ];

    return password_hash( $password, PASSWORD_BCRYPT, $options);
}

?>
