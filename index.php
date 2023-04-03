<?php
//necessario para usar logica do composer
require_once "vendor/autoload.php";
//arquivo xlsx
$file = "planilha-lorem.xlsx";
//usando a biblioteca para ler
$reader = \Ark4ne\XlReader\Factory::createReader($file);
//prepara a leitura do arquivo
$reader->load();

echo "<pre>";
//loop com as linhas do arquivo
foreach ($reader->read() as $row){
    print_r($row);
}
echo "</pre>";