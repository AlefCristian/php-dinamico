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
                    <span class="caminho">Home &raquo; Manutencao</span>
                    <h1>Modo de manutencao</h1>
                    <?php
                    if(isset($_POST['altera']) && $_POST['altera'] == 'ok'){
                        $status = $_POST['status'];
                        $alterar = mysql_query("update manu set estatus = '$status' where id = '1'") or die (mysql_error());
                        if($alterar >= '1') {
                            echo '<div class="ok">Status alterado com sucesso</div>';
                        } else {
                            echo '<div class="no">Ocorreu um erro ao alterar o status</div>';
                        }
                    }                    
                    
                    ?>
                    <p><strong>Se o modo de manutencao estiver Ativo</strong>, apenas quem esta logado pode visualizar o painel</p>
                    <p>Mantenha desativado para que seus usuarios possan acessar o seu site</p>
                    <form name="menu" action="" method="post" enctype="multipart/form-data">
                        <select name="status" id="status">
                            <option value="inativo">Desativado</option>
                            <option value="ativo">Ativado</option>
                        </select>
                        <input type="hidden" name="altera" value="ok">
                        <input type="submit" name="alterar" value="Aplicar" class="pagina_btn">
                    </form>                                                  
                </div>
            </div>
            <div id="clear"></div>
        </div>         
        <?php include"footer.php";?>
