<?php require_once('connections/config.php');

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['login'])) {
  $loginUsername=$_POST['login'];
  $password=$_POST['senha'];
  $MM_fldUserAuthorization = "nivel";
  $MM_redirectLoginSuccess = "admin/painel.php";
  $MM_redirectLoginFailed = "admin/index.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_config, $config);

  $LoginRS__query=sprintf("SELECT usuario, senha, nivel FROM users WHERE usuario=%s AND senha=%s",
  GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text"));

  $LoginRS = mysql_query($LoginRS__query, $config) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {

    $loginStrGroup  = mysql_result($LoginRS,0,'nivel');

    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta http-equiv="content-type" content="text/html" charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="_css/styele.css">
        <link rel="stylesheet" type="text/css" href="scripts/shadowbox/shadowbox.css">
        <?php
        //$pgatual = strtolower(end(explode('/',$_GET['pagina'])));

        $pgatual = '';
        if(isset($_GET['topicos'])){
            $ex = explode('/', ($_GET['topicos']));
            $pgatual = strtolower(end($ex));
        }        

        include"scripts.php";
        include"scripts/limita_palavra.php";
        include"connections/config.php";


        $conexao = mysql_connect($hostname_config, $username_config, $password_config) or die(mysql_error());

        $db = mysql_select_db($database_config) or die(mysql_error());

        $verificar_menu = mysql_query("select estatus from manu where estatus = 'ativo'") or die(mysql_error());

        if(@mysql_num_rows($verificar_menu) >= '1' && (empty($_SESSION['MM_Username']))) {
            echo '<h1>Site em manutencao, favor volte mais tartde, bjos!</h1>';
            exit;
        }
        $info_not = 'Estamos alimentando o site, favor volte mais tarde!';
        ?>
        <title>UpInside | <?php echo $pgatual;?></title>
    </head>

    <body>
        <div id="box">
            <div id="header">
                <div id="header_logo">
                    <img src="images/logo.png">
                </div>
                <div id="header_contatos">
                    <h1>Duvidas sobre nossos cursos?</h1>
                    Fone: (xx) xxxx-xxxx<br>
                    Fax: (xx) xxxx-xxxx
                </div>
            </div>

            <div id="menu">
                <ul>
                    <li><a href="index.php?pagina=nav/home">Inicio</a></li>
                    <li><img src="images/menu_sp.jpg"></li>
                    <li><a href="index.php?pagina=nav/page&amp;pagi=empresa">Empresa</a></li>
                    <li><img src="images/menu_sp.jpg"></li>
                    <li><a href="index.php?pagina=nav/page&amp;pagi=nossos livros">Nossos Livros</a></li>
                    <li><img src="images/menu_sp.jpg"></li>
                    <li><a href="index.php?pagina=nav/page&amp;pagi=nossos cursos">Nossos Cursos</a></li>
                    <li><img src="images/menu_sp.jpg"></li>
                    <li><a href="index.php?pagina=nav/contato">Fale Conosco</a></li>
                    <li><img src="images/menu_spF.jpg"></li>
                </ul>
                <div id="menu_search">
                    <form name="search" action="index.php?pagina=nav/search" method="post">
                        <input type="text" name="pesquisa">
                        <input type="submit" name="Encontre" value="Encontre" class="search_btn">
                    </form>
                </div>
            </div>
            <div id="content">
