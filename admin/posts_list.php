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
                    <span class="caminho">Home &raquo; Listar posts</span>
                    <h1>Cadastrar posts</h1>
                    <?php
                    if(isset($_POST['excluir_post']) && $_POST['excluir_post'] == 'excluir' ){

                        $post_meta = $_POST['id_do_post'];
                        $pega_imagen = mysql_query("select thumb, categoria from posts where id = '$post_meta'") or die (mysql_error());
                        if(@mysql_num_rows($pega_imagen) <= '0'){
                            echo "<div class=\"no\">Erro ao selecionar o post</div>";
                        } else {
                            while($res_pega_imagen = mysql_fetch_array($pega_imagen)){
                                $thumb_meta = $res_pega_imagen[0];
                                $categoria_meta = $res_pega_imagen[1];
                                chdir("../uploads/$categoria_meta");
                                $del = unlink("$thumb_meta");
                                                               
                                $deletar_post = mysql_query("delete from posts where id = '$post_meta'") or die (mysql_error());
                                if($deletar_post >= '1'){
                                    echo "<div class=\"ok\">Tópico foi removido com sucesso</div>";
                                } else {
                                    echo "<div class=\"no\">Erro ao excluir tópico</div>";
                                }
                            }
                        }
                    }
                    ?>
                    <table width="100%" border="0" cellpadding="0" cellspacing="1" class="tabela">
                        <tr>
                            <td align="center" bgcolor="e0e0e0">Data</td>
                            <td align="center" bgcolor="e0e0e0">Categoria</td>
                            <td align="center" bgcolor="e0e0e0">Título do post</td>
                            <td align="center" bgcolor="e0e0e0">Editar</td>
                            <td align="center" bgcolor="e0e0e0">Excluir</td>
                        </tr>
                        <?php
                        $pag = "$_GET[pag]";
                        if($pag >= '1'){
                            $pag = $pag;
                        }else{
                            $pag = '1';
                        }
                        $maximo = '12'; //RESULTADOS POR PÁGINA
                        $inicio = ($pag * $maximo) - $maximo;
                        
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
                        order by id desc
                        limit $inicio, $maximo")
                            or die(mysql_error());
                        
                        if (@mysql_num_rows($noticias) == '0') {
                            echo "<div class=\"no\">Sem noticia cadastrada</div>";
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
                                $res_noticias[9];
                        
                        ?>
                        <tr>
                            <td bgcolor="#c8c8c8" align="center"><?php echo date('d/m/y', strtotime($data));?></td>
                            <td bgcolor="#c8c8c8" align="center" height="20"><?php echo $categoria;?></td>
                            <td bgcolor="#c8c8c8" align="center" height="20"><?php echo $titulo;?></td>
                            <td bgcolor="#c8c8c8" align="center">
                                <form name="editar_posts" action="posts_editar.php" enctype="multipart/form-data" class="lista_posts">
                                    <input type="hidden" name="id_do_post" value="<?php echo $id;?>">
                                    <input type="submit" name="editar" value="Editar" class="lista_btn"> 
                                </form>                            
                            </td>
                            <td bgcolor="#c8c8c8" align="center">
                                <form name="excluir_posts" action="" enctype="multipart/form-data" class="lista_posts" method="post">
                                    <input type="hidden" name="id_do_post" value="<?php echo $id;?>">
                                    <input type="hidden" name="excluir_post" value="excluir">
                                    <input type="submit" name="excluir" value="Excluir" class="lista_btn"> 
                                </form>                      
                            </td>
                        </tr>
                        <?php
                            }
                        }                        
                        ?>
                    </table>
                    <br>
                  <div class="paginator">
                        <?php
                        //USE A MESMA SQL QUE QUE USOU PARA RECUPERAR OS RESULTADOS
                        //SE TIVER A PROPRIEDADE WHERE USE A MESMA TAMBÉM
                        $sql_res = mysql_query("SELECT * FROM posts order by id desc");
                        $total = mysql_num_rows($sql_res);

                        $paginas = ceil($total/$maximo);
                        $links = '5'; //QUANTIDADE DE LINKS NO PAGINATOR

                        echo "<a href=\"posts_list.php?pag=1\">Primeira Página</a>&nbsp;&nbsp;&nbsp;";


                        for ($i = $pag-$links; $i <= $pag-1; $i++){
                            if ($i <= 0){

                            }else{
                                echo"<a href=\"posts_list.php?pag=$i\">$i</a>&nbsp;&nbsp;&nbsp;";}
                        }echo "$pag &nbsp;&nbsp;&nbsp;";


                        for($i = $pag +1; $i <= $pag+$links; $i++){
                            if($i > $paginas){

                            }else{            
                                echo "<a href=\"posts_list.php?pag=$i\">$i</a>&nbsp;&nbsp;&nbsp;";
                            }            
                        }
                            echo "<a href=\"posts_list.php?pag=$paginas\">Última página</a>&nbsp;&nbsp;&nbsp;";
                        ?>
                    </div>                              
                </div>
            </div>
            <div id="clear"></div>
        </div>         
        <?php include"footer.php";?>
