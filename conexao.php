<?php

$server = '127.0.0.1';
$user = 'root';
$pass = '';
$bd = 'repositories-crud';

if($conn = mysqli_connect($server, $user,$pass, $bd)){    
}
else{
    echo 'Erro na conexão ao BD';
}


?>