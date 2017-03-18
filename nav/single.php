<div id="page_content">
    
    <div id="sidebar">
        <?php include"sidebars/sidebars.php";?>
    </div>
    <div id="page">
        <?php
        $topico = $_GET['topico'];
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
        where id = '$topico'") or die(mysql_error());
        
        if (@mysql_num_rows($noticias) == '0') {
            echo "$info_not";
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
                
                $numero++;
                
                $add_visitas = $visitas+1;
                $up_visitas = mysql_query("update posts set visitas = '$add_visitas' where id = '$id', data = '$data''");
                
                include"scripts/autor.php";    
            
?>
        <h1><?php echo $titulo;?></h1>
        <span class="info">Data: <?php echo date('d/m/Y - H/m', strtotime($data));?> | Autor: <?php echo $autor_post;?> | Categoria: <?php echo $categoria;?> | Visitas: <?php echo $visitas+1;?></span>
        <a href="uploads/<?php echo $categoria;?>/<?php echo $thumb;?> " rel="shadowbox">
        <img src="uploads/<?php echo $categoria;?>/<?php echo $thumb;?>" width="250" class="alinright" alt="<?php echo $titulo;?>">
        </a>
        <?php echo $texto;?>
        
        <?php
            if($categoria == 'produtos'){            
        ?>
       
        <!-- INICIO FORMULARIO BOTAO PAGSEGURO -->
        <form action="https://pagseguro.uol.com.br/checkout/v2/payment.html?iot=button" method="post" onsubmit="PagSeguroLightbox(this); return false;" class="page_form">
        <!-- NÃO EDITE OS COMANDOS DAS LINHAS ABAIXO -->
        <input type="hidden" name="code" value="78C747345757DBB224263FACCAB0E8A3" />
        <input type="image" src="https://stc.pagseguro.uol.com.br/public/img/botoes/pagamentos/120x53-comprar.gif" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!" class="btn_page" />
            <span class="compre_aqui">Para comprar clique no botão do PagSeguro</span>
        </form>
        <script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>
        <!-- FINAL FORMULARIO BOTAO PAGSEGURO -->
        <?php
            }
        ?>
        <?php              
           }
        }
        ?>        
    </div>
</div>
