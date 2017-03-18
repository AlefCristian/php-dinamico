<?php require_once('../connections/config.php'); ?>
<?php
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
?>
<?php
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
  $MM_redirectLoginSuccess = "painel.php";
  $MM_redirectLoginFailed = "index.php";
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
        <meta charset="utf-8">
        <link href="style.css" rel="stylesheet" type="text/css">
        <title>UpInside | Gerenciador de sites</title>
    </head>
    <body>
        <div id="box">
            <div id="header">
                <div id="header_logo">
                    <a href="painel.php">
                    <img src="images/logo.png" hr alt="" border="0">
                    </a>
                </div>
            </div>
        
            <div id="painel_login">
                <div class="alert"><strong>Para ter acesso  ao painel, você deve:</strong><br>&raquo;Estar logado.<br>&raquo;Ter nivel acesso.</div>
                <form method="post" action="" name="login_erro">
                    <fieldset>                    
                        <legend>Voce precisa logar-se!</legend>
                        <label>                        
                            <span>Usúario</span>
                            <input type="text" name="login">
                        </label>
                        <label>
                            <span>Senha</span>
                            <input type="password" name="senha">
                        </label>
                        <input type="submit" name="logar" value="Logar-se" class="login_btn">
                    </fieldset>
                </form>
            </div>
        </div>
    </body>
</html>