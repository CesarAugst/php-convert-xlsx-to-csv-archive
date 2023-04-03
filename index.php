<?php
//modulos
require_once "modules/file_manipulator.php";

//fazz upload do arquivo e resgata o nome
$file_name = FileManipulator::upload($_FILES);
//se nao houve sucesso no upload do arquivo
if(!$file_name){
    //finaliza execucao
    die('nao foi possivel converter');
}
//faz conversao
//echo xls_to_csv(100, "uploads/".$file_name['file_name'], $file_name['file_extension']);



//url da conversao
$url = 'http://localhost:3000/converter_by_api.php';

if (function_exists('curl_file_create')) { // php 5.5+
    $cFile = curl_file_create("uploads/".$file_name['file_name']);
} else { //
    $cFile = '@' ."uploads/".$file_name['file_name'];
}

$post = array('assessoria_id' => 100, 'xls_ext' => $file_name['file_extension'], 'file_contents' => $cFile);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($ch);
curl_close ($ch);

echo $result;