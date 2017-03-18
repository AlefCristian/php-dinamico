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
                    <?php
                    $visitas_total = mysql_query("select Sum(visitas)  as visitas from posts ") or die(mysql_error());
                    if(@mysql_num_rows($visitas_total) >= '0') echo '';
                    $views = 0;
                    $visitas = mysql_result($visitas_total, $views, 'visitas');
                    
                    $visitas_media = mysql_query("select id from posts") or die(mysql_error());
                    $linhas = mysql_num_rows($visitas_media);
                    if($linhas >= '2') {
                        $media = ceil($visitas/$linhas);
                    }                    
                    $post_produtos = mysql_query("select id from posts where categoria = 'produtos'") or die(mysql_error());
                    $produtos_linhas = mysql_num_rows($post_produtos);
                    
                    $post_novidades = mysql_query("select id from posts where categoria = 'novidades'") or die(mysql_error());
                    $novidades_linhas = mysql_num_rows($post_novidades);
                    
                    $post_cursos = mysql_query("select id from posts where categoria = 'cursos'") or die(mysql_error());
                    $cursos_linhas = mysql_num_rows($post_cursos);
                    
                    $user = $_SESSION['MM_Username'];
                    $boas_vindas = mysql_query("select nome, email, nivel from users where usuario = '$user'") or die(mysql_error());
                    if(@mysql_num_rows($boas_vidas) >= '0') echo 'Erro ao selecionar o usuário';
                    else {
                        while($res_boas_vindas = mysql_fetch_array($boas_vindas)) {
                            
                            $nome = $res_boas_vindas[0];
                            $email = $res_boas_vindas[1];
                            $nivel = $res_boas_vindas[2];
                        }                        
                    }
                    ?>                    
                    <h1>Bem vindo <?php echo $nome;?></h1>
                    <strong>Usuário: </strong><?php echo $user;?><br>
                    <strong>Nível de acesso: </strong><?php echo $nivel;?><br>
                    <strong>E-mail: </strong><?php echo $email;?>
                    
                    <h1>Visitas eu seus posts</h1>
                    <strong>Visitas =<?php echo $visitas;?></strong>
                    <h1>Média de visitas em seu site</h1>
                    Visitas = <strong><?php echo $media;?></strong>
                    
                    <h1>Quantidade de posts em seu site</h1>
                    <strong>Total = </strong><?php echo $linhas;?><br>
                    
                    <strong>Produtos = </strong><?php echo $produtos_linhas;?><br>
                    
                    <strong>Novidades = </strong><?php echo $novidades_linhas;?><br>
                    
                    <strong>Cursos = </strong><?php echo $cursos_linhas;?><br>                    
                    
                </div>
            </div>
            <div id="clear"></div>
        </div>         
        <?php include"footer.php";?>