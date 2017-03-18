<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Teste</title>
    </head>
    <body>

        <?php
        include_once'../model/Pagina.php';
        include_once'../dao/PaginaDAO.php';
        $pagina = new Pagina(0);
        $pagina->setPagina("Como conseguir um emprego legal");
        $pagina->setContent("Testemunha de Jeovagem");
        $paginaDao = new PaginaDAO();
        //$paginaDao->save($pagina);
        $paginas = $paginaDao->select();
        ?>
        <table border="2">
            <tr><td>Id</td><td>Pagina</td></tr>
        <?php
                foreach ($paginas as $paginaRow) {
                    ?>
            <tr><td><?php echo $paginaRow->getId(); ?></td><td><?php echo $paginaRow->getPagina(); ?></td></tr>
            <?php
                }
        ?>
        </table>
        <br>
        <hr>
        <br>
        <?php
        include_once'../model/Post.php';
        include_once'../dao/PostDAO.php';
        $post = new Post(1);
        $post->setTitulo("Hello World");
        $post->setText("Ola Mundo, este e o texte das minhas postagens");
        $post->setCategoria("Teste");
        $post->setAutor("Alef Cristian");
        $post->setValor_real("10");
        $post->setValor_pagseguro("20");
        $postDAO = new PostDAO();
        $postDAO->save($post);
        $posts = $postDAO->select();
        ?>
        <table border="2">
            <tr><td>Id</td><td>Título</td><td>Texto</td><td>Categoria</td><td>Autor</td><td>Valor</td><td>Valor PagSeguro</td></tr>
        <?php
                foreach ($posts as $postRow) {
                    ?>
            <tr><td><?php echo $postRow->getId();?></td><td><?php echo $postRow->getTitulo();?></td><td><?php echo $postRow->getText();?></td><td><?php echo $postRow->getCategoria();?></td><td><?php echo $postRow->getAutor();?></td><td><?php echo $postRow->getValor_real();?></td><td><?php echo $postRow->getValor_pagseguro();?></td></tr>
            <?php
                }
        ?>
        </table>
        <br>
        <hr>
        <br>
        
        <?php
        include_once'../model/Usuario.php';
        include_once'../dao/UsuarioDAO.php';
        $usuario = new Usuario(3);
        $usuario->setNome("Graziele Francisca");
        $usuario->setUsuario("grazyelle");
        $usuario->setSenha("mashaeourso");
        $usuario->setEmail("grazi@hotmail.gracom");
        $usuario->setNivel("Encarregada de fazer café");
        
        $usuarioDAO = new UsuarioDAO();
        $usuarioDAO->save($usuario);
        
        $usuarios = $usuarioDAO->select();
        
        ?>
        <table border="2">
            <tr><td>Id</td><td>Nome</td><td>Usuário</td><td>Senha</td><td>E-mail</td><td>Nível</td></tr>
        <?php
                foreach ($usuarios as $usuarioRow) {
                    ?>
            <tr><td><?php echo $usuarioRow->getId();?></td><td><?php echo $usuarioRow->getNome();?></td><td><?php echo $usuarioRow->getUsuario();?></td><td><?php echo $usuarioRow->getSenha();?></td><td><?php echo $usuarioRow->getEmail();?></td><td><?php echo $usuarioRow->getNivel();?></td></tr>
            <?php
                }
        ?>
        </table>     
        <br>
        <hr>
        <br>
        
        <?php
        include_once'../model/Categoria.php';
        include_once'../dao/CategoriaDAO.php';
        $categoria = new Categoria(4);
        $categoria->setCategoria("Dinheiro");
        
        $categoriaDAO = new CategoriaDAO();
        $categoriaDAO->save($categoria);
        
        $categorias = $categoriaDAO->select();
        
        ?>
        <table border="2">
            <tr><td>Id</td><td>Categoria</td></tr>
        <?php
                foreach ($categorias as $categoriaRow) {
                    ?>
            <tr><td><?php echo $categoriaRow->getId();?></td><td><?php echo $categoriaRow->getCategoria();?></td></tr>
            <?php
                }
        ?>
        </table>     
    </body>
</html>

