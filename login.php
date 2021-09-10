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
        <h1 class="titulos" style="margin-left:10%;">Tela de Login
        <?php
        @$v = $_GET['valor'];
        if($v){
            echo '<span style="color:red;"> - Todos os campos devem ser preenchidos</span>';
        }
        ?>
        </h1>
        <form action="logar.php" method="post" enctype="multipart/form-data">
            <input type="email" name="email" class="campos_cad" placeholder="E-mail">
            <input type="password" name="senha" class="campos_cad" placeholder="Senha">
            <div id="botoes">
                <input type="submit" value="Logar" class="bt_cad">
                <input type="reset" value="Limpar" class="bt_cad">
            </div>
        </form>
        <div class="botoes">
            <a href="index.php" class="form_link">&larr;Voltar para página princípal</a>
            <p class="p_form">Ainda nao possui cadastro? Então click no link abaixo para fazer cadastro</p>
            <a href="form_cadastro.php" class="form_link">Cadastrar-se</a>
        </div>
    </div>
</body>
</html>