<div id="conteudo_principal">
<h1 class="titulos">Página de Scripts CSS</h1>
<?php
    /**Incluindo a conexao com banco de dados */
    include "connection.php";
    date_default_timezone_set("America/Sao_paulo");
    /**Realizar a consulta das postagens no banco para carregar na pagina  */
    $sql = mysqli_query($link,"SELECT * FROM tb_postagens WHERE page = 2 ORDER BY id_post DESC");
    while($line = mysqli_fetch_array($sql)){
        $id_post = $line['id_post'];
        $titulo = $line['titulo'];
        $imagem = $line['imagem'];
        $conteudo = $line['texto'];
        $dt = $line['dt'];
        $hr = $line['hr'];
        

?>

    <div class="postagens">
            <h1 class="titulos"><?php echo $titulo ?></h1>
            <img src="postagens/post<?php echo $id_post ?>/<?php echo $imagem ?>" alt="postagem" class="imagen">
            <p class="paragrafo"><?php echo $conteudo ?></p>
            <span class="data"><?php echo date('d-m-Y',strtotime($dt))."<br><br>".date('H:i',strtotime($hr));?><br><br></span>
    </div>
   <?php }?>
</div>
<div id="recentes">
<h1 class="titulos">Recentes</h1>
<?php
        $sql = mysqli_query($link,"SELECT * FROM tb_postagens WHERE page = 2 ORDER BY id_post DESC limit 5");
        while($line = mysqli_fetch_array($sql)){
            
            $titulo = $line['titulo'];
            $dt = $line['dt'];
                
    ?>


    <div class="postagens_recentes">
        <h1 class="titulos"><?php echo $titulo ?></h1>
        <span class="data"><?php echo date('d-m-Y',strtotime($dt)) ?></span>
    </div>
<?php } ?>
</div>