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
            <span class="caminho">Home &raquo; Editar posts</span>
            <h1>Editar posts</h1>
            
            <?php
            if(isset($_POST['editar_post']) && $_POST['editar_post'] == 'ed'){
                                
                $user = $_SESSION['MM_Username'];                
                $img = $_FILES['thumb'];
                $titulo = strip_tags(trim($_POST['titulo']));
                $texto = $_POST['texto'];
                $categoria = (trim($_POST['categoria']));
                $data = strip_tags(trim($_POST['data']));
                $id_autor_editar = $_GET['id_do_post'];
                $valor_real = (trim($_POST['valor_real']));
                $valor_pag =(trim($_POST['valor_pagseguro']));
                
                                
                $entrada = trim("$data");
                    if(strstr($entrada, "/")){
                        $aux = explode("/", $entrada); 
                        $aux2 = date('H:i:s');
                        $aux3 = $aux[2] . "-" . $aux[1] . "-" . $aux[0] . " " . $aux2;
                    }
                
                if(empty($_FILES['thumb']['name'])){
                    $editar_post = mysql_query("update posts set titulo = '$titulo', texto = '$texto', categoria = '$categoria', data = '$aux3', valor_real = '$valor_real', valor_pagseguro = '$valor_pag' where id = '$id_autor_editar'") or die (mysql_error());
                                        
                    if(mysql_affected_rows() > '0'){
                        echo "<div class=\"ok\">Seu tópico foi alterado com sucesso!</div>";
                    }else{
                        echo "<div class=\"no\">Erro ao alterar o tópico</div>";
                    }
                } else {
                    $pasta = "../uploads/$categoria";
                    $permitido = array('image/png', 'image/jpeg', 'image/pjpeg');
                    require("scripts/funcao_upload.php");
                    $nome = $img['name'];
                    $tmp = $img['tmp_name'];
                    $type = $img['type'];
                    
                    if(!empty($nome) && in_array($type, $permitido)){
                        $name = md5(uniqid(rand(), true)).".jpg";
                        Redimensionar($tmp, $name, 500, $pasta);
                        
                        $pega_imagen = mysql_query("select thumb, categoria from posts where id = '$id_autor_editar'") or die (mysql_error());
                        
                        if(@mysql_num_rows($pega_imagen) <= '0'){
                            echo "<div class=\"no\">Erro ao selecionar o post</div>";
                        } else {
                            
                            while($res_pega_imagen = mysql_fetch_array($pega_imagen)){
                                $thumb_meta = $res_pega_imagen[0];
                                $categoria_meta = $res_pega_imagen[1];
                                chdir("$pasta");
                                $del = unlink("$thumb_meta");
                            }
                        }
                        
                        $editar_post = mysql_query("update posts set thumb = '$name', titulo = '$titulo', texto = '$texto', categoria = '$categoria', data = '$aux3', valor_real = '$valor_real', valor_pagseguro = '$valor_pag' where id = '$id_autor_editar'") or die (mysql_error());
                        
                        if(mysql_affected_rows() > '0'){
                            echo "<div class=\"ok\">Seu tópico foi alterado com sucesso!</div>";
                        }else{
                            echo "<div class=\"no\">Erro ao alterar o tópico</div>";
                        }        
                    }
                                
                    
                }
            }
                        
                                   
            $editar_post_id = $_GET['id_do_post'];
            $noticias=mysql_query("select
            id,
            thumb,
            titulo,
            texto,
            categoria,
            data,
            autor,
            valor_real,
            valor_pagseguro,
            visitas
            from posts
            where id = '$editar_post_id'")
                or die(mysql_error());
            
            if (@mysql_num_rows <= '0') {
                echo "Não encontramos notícias este momento";
            } else {
                while ($res_noticias =  mysql_fetch_array($noticias)) {
                    $id = $res_noticias[0];
                    $thumb = $res_noticias[1];
                    $titulo = $res_noticias[2];
                    $textoantes = $res_noticias[3];
                    $categoria = $res_noticias[4];
                    $dataantes = $res_noticias[5];
                    $autor = $res_noticias[6];
                    $valor_real = $res_noticias[7];
                    $valor_pagseguro = $res_noticias[8];
                    $visitas = $res_noticias[9];
            ?>
            
            <form id="editar_posts" name="editar_posts" method="post" action="" enctype="multipart/form-data">
                <fieldset> 
                    <label>
                        <span>Categoria</span>
                        <select name="categoria" id="categoria">
                            <option value="<?php echo $categoria;?>">
                                <?php echo $categoria;?>
                            </option>
                            <option id="novidades" value="novidades">
                                Novidades
                            </option>
                            <option id="cursos" value="cursos">
                                Cursos
                            </option>
                            <option id="produtos" value="produtos">
                                Produtos
                            </option>                            
                        </select>
                    </label>                    
                    
                    <label>
                        <span>Título</span>
                        <input type="text" name="titulo" value="<?php echo $titulo;?>">
                    </label>
                    
                    <label>
                        <span>Data</span>
                        <input type="data" name="data" OnKeyUp="return dateMask(this, event);" maxlength="10" value="<?php echo date('d/m/Y', strtotime($dataantes));?>">
                    </label>
                    
                    <?php
                    if($categoria == 'produtos'){
                        echo "<div id=\"produtos_class\">";
                    } else {
                        echo "<div id=\"produtos_class\" style=\"display: none\">";
                    }
                    ?>                    
                        <br>
                        <div class="no"><strong>Para postar um produto, os campos abaixo são obrigatórios</strong></div>
                        <label>
                            <span>Valor R$ <strong>(Ex: 15,50)</strong></span>
                            <input type="text" name="valor_real" value="<?php echo $valor_real;?>">
                        </label>

                        <label>
                            <span>Valor PagSeguro R$ <strong>(Ex: 1550)</strong></span>
                            <input type="text" name="valor_pagseguro" value="<?php echo $valor_pagseguro;?>">
                        </label>
                    </div>
                    
                    <label>
                        <span>Imagen de exibição</span>
                        <input type="file" name="thumb" size="60px">
                    </label>
                    
                    <label>
                        <span>Texto</span>
                        <textarea name="texto" rows="5"><?php echo "$textoantes";?></textarea>
                    </label>
                    <input type="hidden" name="id_do_post" value="<?php echo $id;?>">
                    <input type="hidden" name="editar_post" value="ed">
                    <input type="submit" value="Editar" name="editar" class="cadastro_btn">
                </fieldset>
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