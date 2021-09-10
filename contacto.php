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
    <div id="geral">
    
        <div id="topo">
          <?php include "topo.php"; ?>
        </div>
        <div id="menu">
             <?php include "menu.php"; ?>
        </div>
        <div id="conteudo">
            <br><br>
           <form action="cad_contato.php" method="post">
                <label for="idnome" class="legenda">Nome:</label><br>
                <input type="text" name="nome" class="campos" id="idnome" placeholder="Digite seu nome completo" require><br>

                <label for="idemail" class="legenda">E-email:</label><br>
                <input type="email" name="email" class="campos" id="idemail" placeholder="Digite seu email aqui"><br>

                <label for="idassunto" class="legenda">Assunto:</label><br>
                <input type="text" name="assunto" class="campos" id="idassunto" placeholder="Sobre o que você deseja falar?"><br>

                <label for="idconteudo" class="legenda">Conteúdo:</label><br>
                <textarea name="conteudo" class="campo2" id="idconteudo" cols="30" rows="10" placeholder="Digite no máximo  140 caracteres ou conteúdo" maxlength="140"></textarea><br>
                <input type="submit" value="Enviar" class="btn_enviar">
                
                
           </form>
        </div>
        <div id="rodape">
           <?php include "rodape.php"; ?>
        </div>

    </div>
</body>
</html>