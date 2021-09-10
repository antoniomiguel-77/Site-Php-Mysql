<img src="imagens/logo.png" alt="logo" class="logo">
<?php 

include 'connection.php';
@session_start();// Inicia  ou recupera uma sessao
@$email = $_SESSION['login'];
//Realizar consulta no banco de dados 
$sql = mysqli_query($link,"select * from tb_user where email = '$email'");
 


//Pegar o nivel de acesso e a senha do usuario logado
while($line = mysqli_fetch_array($sql)){
  $senha = $line['senha'];
  $nivel = $line['nivel'];
}

if(@$nivel == 1){
    echo "<a href=logout.php class=links_topo>Sair</a>";
    echo "<a href=adm.php class=links_topo>Ir para Adm</a>";
}else if(@$nivel == null){
  echo  "<a href=login.php class=links_topo>Logar</a>";
  echo  "<a href=form_cadastro.php class=links_topo>Cadastre-se</a>";
}else{
    echo  "<a href=logout.php class=links_topo>Sair</a>";
  echo  "<a href=cliente.php class=links_topo>Ir para cliente</a>";
}


?>

