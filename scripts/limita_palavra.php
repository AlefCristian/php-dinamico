<?php
function limitarTexto($texto, $limite = 100){
$contador = mb_strlen($texto);
if ( $contador >= $limite ) {
$texto = mb_substr($texto, 0, mb_strrpos(mb_substr($texto, 0, $limite), ' '), 'UTF-8') . '...';
return $texto;
}
else{
return $texto;
}
}
?>