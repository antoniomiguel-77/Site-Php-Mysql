<?php 
// Aqui vamos verificar se tem uma sessao iniciada para libera a pagina do administrador
include 'connection.php';

session_start();// Inicia ou recupera uma sessao que esta em aberto
$login = $_SESSION['login'];// Coloc na variavel o valor da sessao
$senha_log  = $_SESSION['password'];// Coloc na variavel o valor da sessao

//Faz uma consulta no banco de dados
$sql = mysqli_query($link,"select * from tb_user where email = '$login'");

// Busca o resultado da consulta e coloca num array
while($line = mysqli_fetch_array($sql)){
    $senha = $line['senha'];
    $nivel = $line['nivel'];
    $foto = $line['foto'];
    $id = $line['id_user'];
}

if($senha_log == $senha && $nivel == 1){

}else{
    header('location:index.php');
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site em PHP</title>
    <link rel="stylesheet" href="css/formato.css">
</head>
<body>
    <div id="box_log">
        <h1 class="titulos" style="margin-left:2%;">Usuário logado como: <?php echo $login  ?></h1>
          <a href="index.php" style="margin-left: 2%;">Ir para Home</a> | <a href="form_postar.php">Criar uma postagem</a> | <a href="form_scriptcss.php">Criar script css</a> | 
          <a href="logout.php">Logout</a>
          <img src="<?php echo "user/user$id/$foto" ?> "  style="float:right; width:60px; height:auto; margin:-20px 5px 0 0; border-radius:60px"alt="">

    </div>
</body>
</html>