<?php
//Conexão
require_once 'db_connect.php';

//Sessão
session_start();

// Botão enviar
if(isset($_POST['btn-entrar'])):
    $erros = array();
    $login = mysqli_escape_string($connect, $_POST['login']);
    $senha = mysqli_escape_string($connect, $_POST['senha']);

    if(empty($login) or empty($senha)):
        $erros[] = "<li> O campo login e senha precisa ser preenchido <li>";
    else:
        $sql = "SELECT login FROM sistemacadastro WHERE login ='$login'";
        $resultado = mysqli_query($connect, $sql);
        
        if(mysqli_num_rows($resultado) > 0):

            $senha = md5($senha);
            $sql = "SELECT * FROM sistemacadastro WHERE login = '$login' AND senha = '$senha'";
            $resultado = mysqli_query($connect, $sql);

            if(mysqli_num_rows($resultado) == 1):
                $dados = mysqli_fetch_array($resultado);
                $_SESSION['logado'] = true;
                $_SESSION['id_usuario'] =$dados['id'];
                header('Location: home.php');
            else:
                $erros[] = "<li> Usuario e senha não conferem <li>";   
            endif;
         else:
            $erros[] = "<li> Usuario inexistente </li>";
        endif;    

    endif;
endif;
?>

<html>
<head>
    <title>Login</title>
    <meta charset="utf-8">
</head>
<body>
<h1>Login</h1>
<?php
if(!empty($erros)):
    foreach($erros as $erro):
    echo $erro;
    endforeach;
endif;
?>
<hr>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
login: <input type="text" name="login"><br>
senha: <input type="password" name="senha"><br>
<button type="submit" name="btn-entrar">Entrar</button>    
</form>

</body>
</html>