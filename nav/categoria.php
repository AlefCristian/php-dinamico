<div id="page_content">
    
    <div id="sidebar">
        <?php include"sidebars/sidebars.php";?>
    </div>
    <div id="page">
        <?php
        
        $pag = "$_GET[pag]";
        if($pag >= '1'){
            $pag = $pag;
        }else{
            $pag = '1';
        }

    $maximo = '5'; //RESULTADOS POR PÁGINA
    $inicio = ($pag * $maximo) - $maximo;
        
        echo "$inicio";        
        $categoria = $_GET['cat'];
        $noticias=mysql_query("select
        id,
        thumb,
        titulo,
        texto,
        categoria,
        'data',
        autor,
        valor_real,
        valor_pagseguro,
        visitas
        from posts
        where categoria = '$categoria'
        order by id DESC
        limit $inicio,$maximo") or die(mysql_error());
        
        if (@mysql_num_rows($noticias) == '0') {
            echo "$info_not<br><br>";
        } else {
       
        while ($res_noticias = mysql_fetch_array($noticias)) {
        $id = $res_noticias[0];
        $thumb = $res_noticias[1];
        $titulo = $res_noticias[2];
        $texto = $res_noticias[3];
        $categoria = $res_noticias[4];
        $data = $res_noticias[5];
        $autor = $res_noticias[6];
        $valor_real = $res_noticias[7];
        $valor_pagseguro = $res_noticias[8];
        $visitas = $res_noticias[9];
            
            include"scripts/autor.php"; 
        ?>
        <div class="categoria">
            <a href="index.php?pagina=nav/single&amp;topico=<?php echo $id;?>">
                <h1><?php echo $titulo;?></h1>
                <span class="info">Data: <?php echo date('d/m/Y - H/m', strtotime($data));?> | Autor: <?php echo $autor_post;?> | Categoria: <?php echo $categoria;?> | Visitas: <?php echo $visitas+1;?></span>

                <img src="uploads/<?php echo $categoria;?>/<?php echo $thumb;?>" width="100" class="alinleft" alt="<?php echo $titulo;?>">

                <p class="categoria_p"><?php echo strip_tags(trim(limitarTexto($texto, $limite = 140)));?>
                </p>
            </a>
        </div>        
        <?php                           
           }            
        }
        ?>
        <div class="paginator">
        <?php
        //USE A MESMA SQL QUE QUE USOU PARA RECUPERAR OS RESULTADOS
        //SE TIVER A PROPRIEDADE WHERE USE A MESMA TAMBÉM
        $sql_res = mysql_query("SELECT * FROM posts where categoria = '$categoria' ORDER BY id DESC");
        $total = mysql_num_rows($sql_res);
 
        $paginas = ceil($total/$maximo);
        $links = '5'; //QUANTIDADE DE LINKS NO PAGINATOR
        
        echo "<a href=\"index.php?pagina=nav/categoria&amp;cat=$categoria&amp;pag=1\">Primeira Página</a>&nbsp;&nbsp;&nbsp;";
        
        
        for ($i = $pag-$links; $i <= $pag-1; $i++){
            if ($i <= 0){
                
            }else{
                echo"<a href=\"index.php?pagina=nav/categoria&amp;cat=$categoria&amp;pag=$i\">$i</a>&nbsp;&nbsp;&nbsp;";
             
            }
        }echo "$pag &nbsp;&nbsp;&nbsp;";

            
        for($i = $pag +1; $i <= $pag+$links; $i++){
            if($i > $paginas){
            
            }else{            
                echo "<a href=\"index.php?pagina=nav/categoria&amp;cat=$categoria&amp;pag=$i\">$i</a>&nbsp;&nbsp;&nbsp;";
            }            
        }
            echo "<a href=\"index.php?pagina=nav/categoria&amp;cat=$categoria&amp;pag=$paginas\">Última página</a>&nbsp;&nbsp;&nbsp;";
        ?>
        </div>
    </div>
</div>
<?php
$add_visitas = $visitas+1;
$up_visitas = mysql_query("update posts set visitas = '$add_visitas' where id = '$id'");
?>