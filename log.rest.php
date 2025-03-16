<?php

date_default_timezone_set('America/Sao_Paulo');

//$inputs = json_decode( file_get_contents('php://input'), true);

$alteracao = 'Acesso Ramais';

$texto = gethostbyaddr($_SERVER['REMOTE_ADDR']).' => '.$_SERVER["REMOTE_ADDR"].' => '.date('d/m/Y H:i')." \r\n";

if(strpos(file_get_contents("logs/log.txt"),$texto ) === false) {

$local = 'logs/log.txt';

$fp = fopen($local, "a+",0);

//Escreve no arquivo aberto.
fwrite($fp, $texto);
 
//Fecha o arquivo.
fclose($fp);

}


?>