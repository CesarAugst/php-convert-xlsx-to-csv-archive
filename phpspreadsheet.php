<?php
//necessario para utilizacao do composer
require_once 'vendor/autoload.php';


//pega nome do arquivo
$file_name = "files/p3.xls";
//chama leitura do arquivo
$xlsx_content = safe_read_file($file_name);
//chama a criacao de novo arquivo
create_new_csv_archive('files/p3-csv', $xlsx_content);

//desc: faz criacao de arquivo csv com base nos dados do arquivo xlsx recebido
//params: (string) nome do arquivo, (array) dados recebidos
//return: nenhum
function create_new_csv_archive($file_name, $array_to_file_content){
    //abre o arquivo com permissao de escrita
    $archive = fopen("$file_name.csv", 'w');
    //loop com os dados recebidos
    foreach ($array_to_file_content as $row){
        //escreve linha no arquivo separando dados por ;
        fputcsv($archive, $row, ';');
    }
    //fecha o arquivo
    fclose($archive);
}

//desc: faz a leitura de arquivo xlsx e converte em array
//params: (string) nome do arquivo, (string)
//return: (array) conteudo do arquivo
function safe_read_file($file_name){
    //separa nome do arquivo da extensao
    $array_file_name = explode('.', $file_name);
    //pega somente a extensao
    $extension = end($array_file_name);

    //se for do formato xlz
    if('xls' == $extension){
        $reader = new PhpOffice\PhpSpreadsheet\Reader\Xls();
    //se for do formato xlsx
    }elseif ('xlsx' == $extension){
        $reader = new PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    //outros formatos nao sao validos
    }else{
        $reader = null;
    }
    //prepara para leitura do arquivo
    $reader = $reader->load($file_name);
    //converte os dados em array
    $file_content = $reader->getActiveSheet()->toArray();

    //retorna o array de conteuo do arquivo
    return $file_content;
}
