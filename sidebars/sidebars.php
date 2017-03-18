<h1>Categorias</h1>
<ul>
    <?php
    $noticias = mysql_query("select id, titulo, categoria from posts group by categoria") or die(mysql_error());
    if(@mysql_num_rows($noticias) <= '0'){
    
    } else {
    while($res_noticia = mysql_fetch_array($noticias)){
        $id = $res_noticia[0];
        $titulo = $res_noticia[1];
        $categoria = $res_noticia[2];
    ?>
    <li><a href="index.php?pagina=nav/categoria&amp;cat=<?php echo $categoria;?>"><?php echo $categoria;?></a></li>
    <?php
        }
    }
    ?>
</ul>
<h1>Mais Visitados</h1>
<ul>
    <?php    
    $noticias = mysql_query("select id, titulo from posts order by visitas desc limit 5") or die(mysql_error());
    if(@mysql_num_rows($noticias) <= '0'){
        echo "$info_not";
    } else {
    while($res_noticia = mysql_fetch_array($noticias)){
        $id = $res_noticia[0];
        $titulo = $res_noticia[1];        
    ?>
    <li><a href="index.php?pagina=nav/single&amp;topico=<?php echo $id;?>"><?php echo $titulo;?></a></li>
    <?php
        }
    }  
?>
</ul>