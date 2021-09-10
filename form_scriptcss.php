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
    <div id="box_form">
        <h1 class="titulos" style="margin-left:10%;">Formulário de Scriptcss</h1>
        <form action="postar_script.php" method="post" enctype="multipart/form-data">
            <input type="text" name="titulo" class="campos_cad" placeholder="Digite o titulo da postagem">
            <input type="file" name="foto" class="campos_cad" >
            <textarea name="conteudo" class="campos_cad" placeholder="Digite aqui o conteúdo..."  cols="30" rows="10" maxlength="300"></textarea>
            <div id="botoes">
                <input type="submit" value="Publicar" class="bt_cad">
                <input type="reset" value="Limpar" class="bt_cad">
            </div>
        </form>
        <div class="botoes">
            <a href="index.php" class="form_link">&larr;Voltar para página princípal</a>
            <a href="form_postar.php" class="form_link" style="margin-left: 30px;">  Ir para form postar&rarr;</a>
         
        </div>
    </div>
</body>
</html>