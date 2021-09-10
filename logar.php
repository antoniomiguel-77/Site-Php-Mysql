<?php
// Arquivo logar.php
include 'connection.php';
$email = $_POST['email'];
$senha = $_POST['senha'];

//Verificar se as variaveis foram preenchidas
if($email != "" && $senha !=""){
   // Faz consulta no banco de dados em busca de usuarios cadastrados
   $sql = mysqli_query($link,"select * from tb_user where email='$email' ");
   //Verifica quantas linhas foram afetadas na consulta
   $registro = mysqli_num_rows($sql);
   while($line = mysqli_fetch_array($sql)){
       $senha_user = $line['senha'];
       $nivel = $line['nivel'];
   }

   if($registro){
        if($senha_user == $senha){
            session_start();
            $_SESSION['login'] = $email;
            $_SESSION['password'] = $senha;
            if($nivel == 1){
                    header("location:adm.php");
            }else{
                header("location:cliente.php");
            }
        }else{
            echo 'Senha Inválida!';
            echo "<a href ='login.php'>Voltar a tela de login</a>";
        }
   }else{
       echo 'Nao existe um registro.Deseja se cadastrar?';
       echo "<a href ='form_cadastro.php'>Cadastrar-se</a>";
   }
  
}else{
   header("location:login.php?valor=1");
}