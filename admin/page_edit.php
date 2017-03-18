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
            <span class="caminho">Home &raquo; Editar Páginas</span>
            <h1>Editar páginas</h1>
            
            <form name="edit_page" method="post" action="page_cadastro.php" enctype="multipart/form-data">
                <select name="pagina" id="pagina">
                    <option value="-1">Selecione a página</option>
                    <option value="empresa">Empresa</option>
                    <option value="nossos livros">Nossos Livros</option>
                    <option value="nossos cursos">Nossos Cursos</option>
                    
                    <input type="submit" name="Editar" value="Editar" class="pagina_btn">
                </select>
            </form>
        </div>
    </div>
    <div id="clear"></div>
</div>         
<?php include"footer.php";?>