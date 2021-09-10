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
           <?php include "conteudo.php";?>
        </div>
        <div id="rodape">
           <?php include "rodape.php"; ?>
        </div>

    </div>
</body>
</html>