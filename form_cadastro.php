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
        <h1 class="titulos" style="margin-left:10%;">Cadastre-se</h1>
        <form action="cadastrar.php" method="post" enctype="multipart/form-data">
            <input type="text" name="nome"  class="campos_cad" placeholder="nome">
            <input type="email" name="email" class="campos_cad" placeholder="E-mail">
            <input type="password" name="senha" class="campos_cad" placeholder="Senha">
            <input type="password" name="repeteSenha" class="campos_cad" placeholder="Confirmar Senha">
            <input type="text" name="lembrete" class="campos_cad" placeholder="Lembrete">
            <input type="file" name="foto" class="campos_cad">
            <div id="botoes">
                <input type="submit" value="Cadastrar" class="bt_cad">
                <input type="reset" value="Limpar" class="bt_cad">
            </div>
        </form>
        <div class="botoes">
            <a href="index.php" class="form_link">&larr;Voltar para página princípal</a>
            <p class="p_form">Já possui cadastro? Então click no link abaixo para fazer login</p>
            <a href="login.php" class="form_link">Logar</a>
        </div>
    </div>
</body>
</html>