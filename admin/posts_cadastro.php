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
            <span class="caminho">Home &raquo; Cadastrar posts</span>
            <h1>Cadastrar posts</h1>
                      
            <?php
            if(isset($_POST['cadastrar_post']) && $_POST['cadastrar_post'] == 'cad'){
                $user = $_SESSION['MM_Username'];
                
                $pega_autor = mysql_query("select id from users where usuario = '$user'") or die(mysql_error());
                if(@mysql_num_rows($boas_vidas) >= '0') echo 'Erro ao selecionar o usuário';
                else {
                    while($res_pega_autor = mysql_fetch_array($pega_autor)) {
                        $id_autor = $res_pega_autor[0];
                    }
                    $img = $_FILES['thumb'];
                    $titulo = strip_tags(trim($_POST['titulo']));
                    $texto = $_POST['texto'];
                    $categoria = (trim($_POST['categoria']));
                    $data = strip_tags(trim($_POST['data']));
                    $autor = "$id_autor";
                    
                    $valor_real = (trim($_POST['valor_real']));
                    $valor_pag =(trim($_POST['valor_pagseguro']));
                                
                    $pasta = "../uploads/$categoria";
                    $permitido = array('image/jpg', 'image/jpeg', 'image/pjpeg');
                                
                    require("scripts/funcao_upload.php");
                    $nome = $img['name'];
                    $tmp = $img['tmp_name'];
                    $type = $img['type'];
                    
                    $entrada = trim("$data");
                    if(strstr($entrada, "/")){
                        $aux = explode("/", $entrada); 
                        $aux2 = date('H:i:s');
                        $aux3 = $aux[2] . "-" . $aux[1] . "-" . $aux[0] . " " . $aux2;
                    }
               
                    if(!empty($nome) && in_array($type, $permitido)){
                        $name = md5(uniqid(rand(), true)).".jpg";
                        Redimensionar($tmp, $name, 500, $pasta);
                        $cadastrar_noticias = mysql_query("INSERT INTO posts (thumb, titulo, texto, categoria, data, autor, valor_real, valor_pagseguro, visitas)
											VALUES ('$name', '$titulo', '$texto', '$categoria', '$aux3', '$autor', '$valor_real', '$valor_pag', '0')")
		                              or die(mysql_error());
					
                        if($cadastrar_noticias >= '1'){
					   echo "<div class=\"ok\">Seu tópico foi cadastrado com sucesso!</div>";
				    }else{
					   echo "<div class=\"no\">Erro ao cadastrar o tópico</div>";
                        }
                    }
                }
            }            
            ?>
            <form id="cadastrar_posts" name="cadastrar_posts" method="post" action="" enctype="multipart/form-data">
                <fieldset> 
                    <label>
                        <span>Categoria</span>
                        <select name="categoria" id="categoria">
                            <option value="">
                                Selecione a categoria
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
                        <input type="text" name="titulo">
                    </label>
                    
                    <label>
                        <span>Data</span>
                        <input type="date" name="data">
                    </label>
                                        
                    <div id ="produtos_class" style="display: none">
                        <br>
                        <div class="no"><strong>Para postar um produto, os campos abaixo são obrigatórios</strong></div>
                        <label>
                            <span>Valor R$ <strong>(Ex: 15,50)</strong></span>
                            <input type="text" name="valor_real">
                        </label>

                        <label>
                            <span>Valor PagSeguro R$ <strong>(Ex: 1550)</strong></span>
                            <input type="text" name="valor_pagseguro">
                        </label>
                    </div>
                    
                    <label>
                        <span>Imagen de exibição</span>
                        <input type="file" name="thumb" size="60px">
                    </label>
                    
                    <label>
                        <span>Texto</span>
                        <textarea name="texto" rows="5"></textarea>
                    </label>
                    
                    <input type="hidden" name="cadastrar_post" value="cad">
                    <input type="submit" value="Cadastrar" name="cadastrar" class="cadastro_btn">
                </fieldset>
            </form>                    
        </div>
    </div>
    <div id="clear"></div>
</div>         
<?php include"footer.php";?>