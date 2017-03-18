<?php
$pega_autor= mysql_query("select nome from users where id = '$autor'") or die(mysql_error());
if(@mysql_num_rows($pega_autor) <= '0') echo 'Erro ao selecionar o usuário';
else {
    while($res_pega_autor = mysql_fetch_array($pega_autor)) {
        $autor_post = $res_pega_autor[0];
    }
}
?>