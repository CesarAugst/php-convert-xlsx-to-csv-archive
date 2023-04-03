<?php
//necessario para utilizacao do composer
require_once 'vendor/autoload.php';
//modulos
require_once "modules/file_manipulator.php";
require_once "modules/csv_manipulator.php"; //criacao dos arquivos csv
require_once 'modules/spreadsheet_manipulator.php'; //leitura de arquivos usando spreadsheet

//faz upload do arquivo
$file = FileManipulator::upload($_FILES, 'converter/');

//se nao fez upload do arquivo
if(!$file){
    die("");
}

//pega nome do arquivo
$file_name = "converter/" . $file['file_name'];
//chama leitura do arquivo
$xlsx_content = SpreadsheetManipulator::read_file($file_name . "." . $file['file_extension']);

//se houver conteudo
if($xlsx_content){
    //caminho e nome completo doa arquivo
    $complete_file_path = 'converter/'.$file['file_name']."-convertido.csv";
    //chama a criacao de novo arquivo
    $content = CsvManipualtor::create_new_file($complete_file_path, $xlsx_content);
    //remove o arquivo
    FileManipulator::delete("$complete_file_path.csv");
}else{
    $content = "";
}
FileManipulator::delete('converter/' . $file['file_name']. "." . $file['file_extension']);
//exibe vazio
echo $content;