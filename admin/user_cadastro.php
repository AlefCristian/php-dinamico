<?php include"header.php";?>
<?php include"scripts/restrict_admin.php";?>
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
            <span class="caminho">Home &raquo; Cadastro de Usúarios</span>
            <h1>Cadastrar usuários</h1>
            
            <?php
            if(isset($_POST['cadastro']) && $_POST['cadastro'] == 'ok'){
                
                $usuario = $_POST['usuario'];
                $senha = $_POST['senha'];
                $nivel = $_POST['nivel'];
                $nome = $_POST['nome'];
                $email = $_POST['email'];
                
                $verifica_usuario = mysql_query("select id from users where usuario = '$usuario'") or die(mysql_error());
                
                if(mysql_num_rows($verifica_usuario) >= '1') {
            ?>
            <div class="no">Este Usuário ja existe</div>
            <?php 
                } else {
                    $cadastrar_user = mysql_query("insert into users (usuario, senha, nivel, nome, email) values ('$usuario', '$senha', '$nivel', '$nome', '$email')") or die(mysql_error());
                    
                    if($cadastrar_user >= '1'){
            ?>
            <div class="ok">Usuário Cadastrado com Sucesso</div>
            <?php
                    } else {
            ?>
            <div class="no">Erro ao Cadastrar Usuário</div>
            <?php
                    }
                }
            }
            ?>                
            
            <form name="cadastrar_user" action="" method="post" enctype="multipart/form-data">
                <label>
                    <span>Usuário</span>
                    <input type="text" name="usuario">
                </label>
                <label>
                    <span>Senha</span>
                    <input type="password" name="senha">
                </label>
                <label>
                    <span>Nível</span>
                    <select name="nivel" id="nivel">
                        <option value="editor">Editor</option>
                        <option value="admin">Admin</option>
                    </select>
                </label>
                <label>
                    <span>Nome</span>
                    <input type="text" name="nome">
                </label>
                <label>
                    <span>E-mail</span>
                    <input type="text" name="email">
                </label>
                
                <input type="hidden" name="cadastro" value="ok">
                <input type="submit" name="Cadastrar" value="Cadastrar" class="cadastro_btn">
            </form>                        
        </div>
    </div>
    <div id="clear"></div>
</div>         
<?php include"footer.php";?>