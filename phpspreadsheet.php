<?php
//necessario para utilizacao do composer
require_once 'vendor/autoload.php';
//modulos proprios
require_once 'modules/create_new_csv_archive.php'; //criacao de arquivos csv
require_once 'modules/spreadsheet_read_file.php'; //leitura de arquivos usando spreadsheet

//pega nome do arquivo
$file_name = "files/p3.xls";

//chama leitura do arquivo
$xlsx_content = spreadsheet_read_file($file_name);
//se houver conteudo
if($xlsx_content){
    //chama a criacao de novo arquivo
    create_new_csv_archive('files/p3-csv', $xlsx_content);
}else{
    //exibe mensagem de erro
    echo "nao foi possivel realizar a conversao. Dica: verifique a extensao do arquivo";
}
