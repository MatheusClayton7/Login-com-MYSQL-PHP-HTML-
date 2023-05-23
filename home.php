<?php
require_once 'db_connect.php';

//Sessão
session_start();
//Dados 
$id = $_SESSION['id_usuario'];
$sql = "SELECT * FROM sistemacadastro WHERE id = '$id'";
$resultado = mysqli_query($connect, $sql);
$dados = mysqli_fetch_array($resultado);
?>

<html>
<head>
    <title>Pagina restrita</title>
    <meta charset="utf-8">
</head>
<body>
    <h1>Olá Usuario <?php echo $dados; ?> </h1>
</body>
</html>