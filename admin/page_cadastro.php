<?php include"scripts/restrict_no.php";?>
<?php include"header.php";?>
<div id="box">
    <div id="header">
        <div id="header_logo">
            <a href="painel.php">
                <img src="images/logo.png" alt="" border="0">
            </a>
        </div>
    </div>
    <div id="content">
        <div id="menu">
            <?php include"menu.php";?>                    
        </div> 
        <div id="conteudo">
            <span class="caminho">Home &raquo; Cadastro de páginas</span>
            <h1>Cadastrar Páginas</h1>
            <?php
            $pagina_editar = $_POST['pagina'];
            $content_editar = $_POST['content'];
            
            if(isset($_POST['cadastrar']) && $_POST['cadastrar'] == 'envia_form'){
                $cadastrar_pagina = mysql_query("insert into pagina (pagina, content) values ('$pagina_editar', '$content_editar')") or die (mysql_error());
            }
            if(isset($_POST['editar_post']) && $_POST['editar_post'] == 'enviar_form'){
                $editar_pagina = mysql_query("update pagina sete content = '$content_editar' where pagina = '$pagina_editar'") or die(mysql_error());
            }            
            $pagina_de_edicao = $_POST['pagina'];
            $pega_pagina = mysql_query("select id, pagina, content from pagina where pagina = '$pagina_de_edicao'") or die (mysql_error());
            if(@mysql_num_rows($pega_pagina) <= '0'){
            ?>
            <form name="cadastrar_pagina" method="post" action="" enctype="multipart/form-data">
                <input type="hidden" name="pagina" value="<?php echo $pagina_de_edicao;?>">
                <textarea name="content" rows="30" cols=""></textarea>
                <input type="hidden" name="cadastrar" value="envia_form">
                <input type="submit" value="Cadastrar" name="Cadastrar" class="cadastro_btn">
            </form>            
            <?php
            } else {
                while($res_pagina = mysql_fetch_array($pega_pagina)){
                    $id = $res_pagina[0];
                    $pagina = $res_pagina[1];
                    $content = $res_pagina[2];
            ?>
            <form name="editar_pagina" method="post" action="" enctype="multipart/form-data">
                <input type="hidden" name="pagina" value="<?php echo $pagina_de_edicao;?>">
                <textarea name="content" rows="30" cols=""><?php echo $content;?></textarea>
                <input type="hidden" name="editar" value="editar_form">
                <input type="submit" value="Editar" name="Editar" class="cadastro_btn">
            </form>
            <?php
                }
            }
            ?>
            
        </div>
    </div>
    <div id="clear"></div>
</div>         
<?php include"footer.php";?>