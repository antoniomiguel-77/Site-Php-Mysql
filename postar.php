<?php
// Aqui vamos verificar se tem uma sessao iniciada para libera a pagina do administrador
include 'connection.php';
date_default_timezone_set('America/sao_paulo');
session_start();// Inicia ou recupera uma sessao que esta em aberto
$login = $_SESSION['login'];// Coloca na variavel o valor da sessao
$senha_log  = $_SESSION['password'];// Coloca na variavel o valor da sessao

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

    $titulo = $_POST['titulo'];
    $foto = $_FILES['foto']['name'];
    $tipo = $_FILES['foto']['type'];
    $conteudo = $_POST['conteudo'];
  //Substituindo caracteres indesejados
  $foto = str_replace(' ','_',$foto);
  $foto = str_replace('â','a',$foto);
  $foto = str_replace('é','e',$foto);
  $foto = str_replace('ç','c',$foto);
  $foto = str_replace('ô','o',$foto);
  $foto = str_replace('ó','o',$foto);

  $registro = false;
  if($tipo != "" and $foto !="" and $conteudo !=""){
    $registro = true;


  }else{
      echo "<script>window.history.go(-1);</script>";
  }

  $sql = mysqli_query($link,"select * from tb_postagens order by id_post desc limit 1");

while($line = mysqli_fetch_array($sql)){
    $id_post = $line['id_post'];
}

   /**Id do usuario recebe ele mesmo +1 */
   @$id_post = $id_post + 1;
   /**Pasta das imagens da postagem */
   $pasta = "postagens/post$id_post";


/**Preencher as variaveis para o cadastro */
$dt = date('Y-m-d');
$hr = date('H:i:s');
$page = 1;// Essa variavel sera usada para dicidir em qual pagina sera carregada cada postagem
/**Cadastrando as postagens no banco */
if($registro){
 
    /**Verifica se a pasta existe, caso não ela é criada */
    if(! file_exists($pasta)){
        mkdir($pasta,0777);
    }
    /**comando SQL para insercao de postagens no banco de dados */
    mysqli_query($link,"INSERT INTO tb_postagens(titulo,imagem,texto,dt,hr,page,id_user)
     VALUES('$titulo','$foto','$conteudo','$dt','$hr','$page',$id)");

move_uploaded_file($_FILES['foto']['tmp_name'],$pasta."/".$foto);
/**Caso não houver erro no cadastro das postagens, então redericion o usuário pra a página de cadastro de postagem */
header('location:form_postar.php');
}else{

    echo 'Não foi possivel cadastrar esse conteudo <br>';
    echo '<a href=form_postar.php>Voltar ao formulário</a>';
    
    
}


}else{
    header('location:index.php');
}



 
