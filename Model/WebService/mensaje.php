<?Php
$destinatario='gisiji4371@satedly.com';

$nombre='';
$asunto='';
$mensaje='';
$email='yam.gil.sh@gmail.com';

$header = "Enviar desde la pagina a temp mail";
$mensajeCompleto=$mensaje."\nAtentamente".$nombre;
mail($destinatario,$asunto,$mensajeCompleto,$header);
?>