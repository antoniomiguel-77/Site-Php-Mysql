<?php
//Definindo o fuso horario local
  date_default_timezone_set('America/sao_paulo');
  //incluindo o arquivo de conecao
   include 'connection.php';
/*Pegar os valores do campos */
    $nome        =  $_POST['nome'];
    $email       =  $_POST['email'];
    $senha       =  $_POST['senha'];
    $reSenha =  $_POST['repeteSenha'];
    $lembrete    =  $_POST['lembrete'];
    $foto        =  $_FILES['foto']['name']; 
    $tipo        =  $_FILES['foto']['type'];

    /*Validacao dos campos para inserir no banco de dados*/
    $registro = false;
    if($nome != "" && $email != "" && $senha != "" && $lembrete != "" && $foto != ""  ){
            
        if ($senha !=$reSenha){
           echo "<script>alert('Senhas Diferentes.'); window.history.go(-1);</script>";
        }else{
           $registro = true;
        }

    }
    else{
        echo "<script>alert('É necesarios preencher todos os campos.'); window.history.go(-1);</script>" ;
    }
    /**Fim da validacao dos campos */
       
//Realizando uma consulta no banco de dados para pegar o id dos usuarios
       $sql = mysqli_query($link,"select * from tb_user order by id_user desc limit 1");
        while($line = mysqli_fetch_array($sql)){
                $id = $line['id_user'];
                $email_user = $line['email'];
        } 

     //Incrementado mais um no id do ultimo usuario cadastrado 
        @$id+=1;

        //Pasta para guardar as fotos dos usuarios
        $pasta = 'user'.$id;
        //Verificar se a pasta existe
        if(!file_exists("user/".$pasta)){
            //funcao para criar pasta no php
            mkdir("user/".$pasta,0777);
        }
    
            //Definindo os formatos das fotos que serao aceites para cadastro no banco de dados
        $formato = array(1=>'image/png',2=>'image/jpg',3=>'image/jpeg',4=>'image/gif');
        //Substituindo caracteres indesejados
        $foto = str_replace(' ','_',$foto);
        $foto = str_replace('â','a',$foto);
        $foto = str_replace('é','e',$foto);
        $foto = str_replace('ç','c',$foto);
        $foto = str_replace('ô','o',$foto);
        $foto = str_replace('ó','o',$foto);
        //colocar o texto em minusculo
        $foto = strtolower($foto);
        
        

        //Faz uma busca no array pelos tipos das imagens
        $teste = array_search($tipo,$formato);
        if($teste == true){
            // Mover a imagem carregada para dentro da pasta
            move_uploaded_file($_FILES['foto']['tmp_name'],"user/".$pasta."/".$foto);
        }else{
            
            echo "<script>alert('Tipo de arquivo não suportado.');</script>"; 
        }
  
        /**Realizar o cadastro  no banco de dados */
      //Pegando a data e a hora do sistema para cadastro no banco de dados
        $dt = date('Y-m-d');
        $hr = date('H:i:s');
        if(@$registro == true &&  @$email!=$email_user){
                 mysqli_query($link,"insert into tb_user(nome,email,senha,lembrete,foto,nivel,dt,hr) 
                 values('$nome','$email','$senha','$lembrete','$foto',2,'$dt','$hr')");
                 //Script para redicionar o usuario a pagina inicial/home
                 //echo "<script>alert('Usuário Cadastrado com sucesso!'); window.location.href='index.php'; </script>";
                 echo "<p style='text-align:center;'>Usuário cadastrado com sucesso!<br>";
                 echo "<a href='index.php' style='text-align:center;color:#59f'>Ir para Home</a> | <a href='login.php' style='text-align:center;color:#59f'>Login</a> </p>";
        }else{
            //Script para fazer o usuario voltar na pagina de cadastro caso o cadastro nao seja realizado
            echo "<script>window.history.go(-1);</>";
        }
   
       