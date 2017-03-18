<?php
$user = $_SESSION['MM_Username'];
$boas_vindas = mysql_query("select nivel from users where usuario = '$user'") or die(mysql_error());
if(@mysql_num_rows($boas_vidas) >= '0') echo 'Erro ao selecionar o usuário';
else {
    while($res_boas_vindas = mysql_fetch_array($boas_vindas)) {
        $nivel = $res_boas_vindas[0];       
    }
}
?>

<h1>Gerenciar Site</h1>                    
<ul>
    <li><a href="painel.php">Home</a></li>
    <li><a href="manutencao.php">Manutencao</a></li>
</ul>
<h1>Gerenciar Posts</h1>                    
<ul>
    <li><a href="posts_cadastro.php">Cadastrar novo</a></li>
    <li><a href="posts_list.php">Listar Posts</a></li>
</ul>
<h1>Gerenciar Páginas</h1>
<ul>
    <li><a href="page_edit.php">Edição de Páginas</a></li>    
</ul>
<h1>Gerenciar Usuários</h1>
<ul>
    <li><a href="user_perfil.php">Editar Perfil</a></li>
<?php
if($nivel == 'admin'){?>
    <li><a href="user_cadastro.php">Cadastrar novo</a></li>
    <li><a href="user_listar.php">Listar Usuários</a></li>
<?php
}
?>
</ul>

<h1>Funções</h1>
<ul>
    <li><a href="../" target="_blank">Visualizar o site</a></li>
    <li><a href="logof.php">Deslogar do painel</a></li>
</ul>