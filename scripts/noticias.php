<ul>
<?php
    
if ($recuperar == 'destaque') {
    $limite = '0,3';
    $quando = 'novidades';
} elseif ($recuperar == 'lista') {
    $limite = '3,5';
    $quando = 'novidades';
} elseif ($recuperar == 'cursos') {
    $limite = '3';
    $quando = 'cursos';  
} elseif ($recuperar == 'produtos') {
    $limite = '16';
    $quando = 'produtos';
}
$noticias=mysql_query("select
    id,
    thumb,
    titulo,
    texto,
    categoria,
    'data',
    autor,
    valor_real,
    valor_pagseguro
    from posts
    where categoria = '$quando'
    order by id desc 
    LIMIT $limite") or die(mysql_error());

if (mysql_num_rows($noticias) <= '0') {
    echo "$info_not";
} else {
    $numero = 0;
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
        $numero++;
                        
        include"autor.php";
        
        if ($recuperar == 'destaque') {
?>
       
<li>
          <img src="uploads/<?php echo $categoria;?>/<?php echo $thumb;?>" width="500" height="300" alt="<?php echo $titulo;?>">
           
    <h1><p>
                     <a href="index.php?pagina=nav/single&amp;topico=<?php echo $id?>">
                      <?php echo $titulo;?>
    </a>
    </h1>
    <a href="index.php?pagina=nav/single&amp;topico=<?php echo $id?>"><?php echo(strip_tags(trim(limitarTexto($texto, $limite = 60))));?>
    </a>
       
    </p>
</li>        
<?php
        } elseif ($recuperar == 'lista') {
?>
<li>
    <a href="index.php?pagina=nav/single&amp;topico=<?php echo $id;?>">
        <span><?php echo $numero;?></span>
        <img src="uploads/<?php echo $categoria;?>/<?php echo $thumb;?>" width="125px" height="75px" alt="<?php echo $categoria?>">
        <h1><?php echo $titulo;?></h1>
        <p><?php echo(strip_tags(trim(limitarTexto($texto, $limite = 70))));?></p>
        <h2><?php echo date('d/m/y',strtotime($data));?> por <?php echo $autor_post;?></h2>
    </a>
</li>
<?php
        } elseif ($recuperar == 'cursos') {
?>
    <li>
        <a href="index.php?pagina=nav/single&amp;topico=<?php echo $id;?>">
            <img src="uploads/<?php echo $categoria;?>/<?php echo $thumb;?>" alt="<?php echo $categoria;?>" width="250" height="150">
            <p><strong><?php echo $titulo;?></strong>
                <?php echo(strip_tags(trim(limitarTexto($texto, $limite = 300))));?></p>
        </a>
    </li>    
<?php
        } elseif ($recuperar == 'produtos') {
?>
    <li>
        <a href="index.php?pagina=nav/single&amp;topico=<?php echo $id;?>">
            <img src="uploads/<?php echo $categoria;?>/<?php echo $thumb;?>" width="100" height="100" alt="<?php echo $categoria;?>">
            <p><strong class="titulo_loja"><?php echo $titulo;?></strong> - <?php echo(strip_tags(trim(limitarTexto($texto, $limite = 60))));?></p>
            <span>R$:<?php echo $valor_real;?></span>
        </a>
    </li>                  
<?php
        }
    }
}
?>
</ul>