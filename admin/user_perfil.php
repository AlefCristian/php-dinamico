<?php include"header.php";?>
<?php include"scripts/restrict_no.php";?>
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
            <span class="caminho">Home &raquo; Editar Perfil</span>
            <h1>Editar</h1>
            <?php
                       
            if(isset($_POST['editar']) && $_POST['editar'] == 'editar'){
                $usuario = $_SESSION['MM_Username'];
                $nome = $_POST['nome'];
                $email = $_POST['e-mail'];
                $password = $_POST['senha'];
                                            
                $atualizar_perfil = mysql_query("update users set nome = '$nome', senha = '$password', email = '$email' where usuario = '$usuario'") or die(mysql_error());
                
                if($atualizar_perfil >= '1'){
            ?>
            <div class="ok">Usuário Alterado com Sucesso!</div>
            <?php
                } else {
            ?>
            <div class="no">Não foi possivel alterar Perfil</div>
            <?php
                    }
            }
            $id_user = $_SESSION['MM_Username'];
            $perfil = mysql_query("select nome, senha, email, id from users where usuario = '$id_user'") or die(mysql_error());
            if(@mysql_num_rows($boas_vidas) >= '0') echo 'Erro ao selecionar o usuário';
            else {
                while($res_perfil = mysql_fetch_array($perfil)) {
                    $nome = $res_perfil[0];
                    $senha = $res_perfil[1];
                    $email = $res_perfil[2];
                    $id_perfil = $res_perfil[3];
            ?>
            <div class="usuario_editar">
                <?php echo $nome;?>
                <?php echo "<br>";?>
                <?php echo $email;?>
            </div>
            <form name="editar" action="" enctype="multipart/form-data" method="post" class="form">
                <label>
                    <span>Alterar Nome:</span>
                    <input type="text" name="nome" value="<?php echo $nome;?>">
                </label>
                <label>
                    <span>Alterar Senha:</span>
                    <input type="password" name="senha" value="<?php echo $senha;?>">
                </label>
                <label>
                    <span>E-mail:</span>
                    <input type="text" name="e-mail" value="<?php echo $email;?>">
                </label>
                
                <input type="hidden" name="editar" value="editar">
                <input type="submit" name="Editar_usuario" value="Editar" class="cadastro_btn">                
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