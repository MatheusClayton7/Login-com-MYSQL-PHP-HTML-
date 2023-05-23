<?php
//Conexão com o banco de dados 

$servername = "localhost";
$username = "root";
$passoword = "";
$db_name = "sistemalogin";

$connect = mysqli_connect($servername, $username, $passoword, $db_name);

if(mysqli_connect_error()):
    echo "Falha na conexão: ".mysqli_connect_error();
endif;
?>