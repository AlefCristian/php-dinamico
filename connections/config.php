<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
$hostname_config = 'localhost';
$database_config = 'sitedinamico';
$username_config = 'root';
$password_config = 'alefcristian';
$config = mysql_pconnect($hostname_config, $username_config, $password_config) or trigger_error(mysql_error(),E_USER_ERROR); 
?>