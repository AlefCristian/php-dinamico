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
            <span class="caminho">Home &raquo; Listar Usúarios</span>
            <h1>Lista de Usuários</h1>
            <?php
            if(isset($_POST['editar']) && $_POST['editar'] == 'editar'){
                
            }
            
            if(isset($_POST['excluir']) && $_POST['excluir'] == 'ok'){
                $id_user = $_POST['user_id'];
                if($id_user == '1'){
            ?>
            <div class="no">Usuário principal não pode ser excluido</div>
            <?php
                } else {
                    $deletar_usuario = mysql_query("delete from users where id = '$id_user'") or die(mysql_error());
                    if($deletar_usuario >= '1'){
            ?>
            <div class="ok">Usuário excluido com sucesso!</div>
            <?php
                    } else {
            ?>
            <div class="no">Error ao excluir usuário.</div>
            <?php
                    }
                }
            }
            ?>
            <div id="lista_usuarios">
                <ul>
                    <?php            
                    $user = $_SESSION['MM_Username'];
                    $boas_vindas = mysql_query("select id, nome, email from users") or die(mysql_error());
                    if(@mysql_num_rows($boas_vidas) >= '0') echo 'Erro ao selecionar o usuário';
                    else {
                        while($res_boas_vindas = mysql_fetch_array($boas_vindas)) {
                            $id = $res_boas_vindas[0];
                            $nome = $res_boas_vindas[1];
                            $email = $res_boas_vindas[2];
                    ?> 
                    <li>
                        <span>
                            <form name="editar" action="user_editar.php" enctype="multipart/form-data" method="post" class="form">
                                <input type="hidden" name="user_id" value="<?php echo $id;?>">
                                <input type="submit" name="Editar" value="Editar">
                            </form>
                            
                            <form name="excluir" action="" enctype="multipart/form-data" method="post" class="form">
                                <input type="hidden" name="user_id" value="<?php echo $id;?>">
                                <input type="hidden" name="excluir" value="ok">
                                <input type="submit" name="Excluir" value="Excluir">
                            </form>
                        </span>
                        <?php                            
                            echo $nome;
                            echo "<br>";
                            echo $email;                            
                        ?>                        
                    </li>
                    <?php
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <div id="clear"></div>
</div>         
<?php include"footer.php";?>