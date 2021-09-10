<div id="conteudo_principal">
    <!--
    <div class="postagens">
            <h1 class="titulos">Título da postagem</h1>
            <img src="imagens/postagem.jpg" alt="postagem" class="imagen">
            <p class="paragrafo">Páragrafo</p>
            <span class="data">30/07/2021</span>
    </div>
    <div class="postagens">
            <h1 class="titulos">Título da postagem</h1>
            <img src="imagens/postagem.jpg" alt="postagem" class="imagen">
            <p class="paragrafo">Páragrafo</p>
            <span class="data">30/07/2021</span>
    </div>
    -->

    <?php
    /**Algoritmo de paginacao do site */
    require "connection.php";
    $qtd_registros = 1;
    @$page = $_GET['page'];
    if(!$page){
        @$pagina = 1;
    }else{
       @$pagina = $page;
    }
    $inicio = $pagina - 1;
    $inicio *=$qtd_registros;

    $sel_parcial = mysqli_query($link,"SELECT * FROM tb_postagens LIMIT $inicio, $qtd_registros");
    $sel_total = mysqli_query($link,"SELECT * FROM tb_postagens");
    $contar = mysqli_num_rows($sel_total);
    $contar_pages = $contar / $qtd_registros;

  
    while($line = mysqli_fetch_array($sel_parcial)){
        $id_post = $line['id_post'];
        $titulo = $line['titulo'];
        $imagem = $line['imagem'];
        $conteudo = $line['texto'];
        $hr = $line['hr'];
        $dt = $line['dt'];
        ?>
    <h1 class="titulos"><?php echo $titulo; ?></h1>
    <img src="postagens/post<?php echo $id_post; ?>/<?php echo $imagem ?>" alt="postagem" class="imagen">
    <p class="paragrafo"><?php echo $conteudo?></p>
    <span class="data"><?php echo date("d/m/Y",strtotime($dt))."<br><br>".date('H:i',strtotime($hr)); ?></span>

    <?php
    }
    
    $anterior = $pagina - 1;
    $proximo = $pagina + 1;
    echo"<br><br>";

    if($pagina > 1){
        echo  "<a href=?page=$anterior>&larr; Anterior</a>";
    }

    for($i = 1; $i<$contar_pages+1;$i++){
        echo"<a href=?page=".$i.">[".$i."]</a>";
    }
    if($pagina < $contar_pages){
        echo "<a href=?page=$proximo>Proximo &rarr;</a>";
    }
    ?>
</div>
<div id="recentes">
<h1 class="titulos">Recentes</h1>
<?php
        $sql = mysqli_query($link,"SELECT * FROM tb_postagens ORDER BY id_post DESC limit 5");
        while($line = mysqli_fetch_array($sql)){
            
            $titulo = $line['titulo'];
            $dt = $line['dt'];
                
    ?>


    <div class="postagens_recentes">
        <h1 class="titulos"><?php echo $titulo ?></h1>
        <span class="data"><?php echo date('d-m-Y',strtotime($dt)) ?></span>
    </div>
    <?php }?>

</div>