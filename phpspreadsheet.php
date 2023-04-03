<?php
//necessario para utilizacao do composer
require_once 'vendor/autoload.php';
//modulos proprios
require_once 'modules/csv_manipulator.php'; //criacao de arquivos csv
require_once 'modules/spreadsheet_manipulator.php'; //leitura de arquivos usando spreadsheet

//pega nome do arquivo
$file_name = "files/p3.xls";

//chama leitura do arquivo
$xlsx_content = SpreadsheetManipulator::read_file($file_name);
//se houver conteudo
if($xlsx_content){
    //chama a criacao de novo arquivo
    CsvManipualtor::create_new_file('files/p3-csv', $xlsx_content);
}else{
    //exibe mensagem de erro
    echo "nao foi possivel realizar a conversao. Dica: verifique a extensao do arquivo";
}
