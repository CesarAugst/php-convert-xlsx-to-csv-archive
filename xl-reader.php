<?php
//necessario para usar logica do composer
require_once "vendor/autoload.php";
//arquivo xlsx para converter
$file = "files/p2.xlsx";
//chama leitura do arquivo
$xlsx_content = safe_read_file($file);
//chama a criacao de novo arquivo
create_new_csv_archive('files/p2-csv', $xlsx_content);

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
function safe_read_file($file, $empty_cell_indicator = "-"){
    //inicia o conteudo do arqiuvo como array vazio
    $file_content = [];

    //usando a biblioteca para ler
    $reader = \Ark4ne\XlReader\Factory::createReader($file);
    //prepara a leitura do arquivo
    $reader->load();

    //pega o cabecalho
    $header = $reader->read()->current();
    //loop com as linhas do arquivo
    foreach ($reader->read() as $row){
        //inicia nova linha
        $new_line = [];
        //loop com os itens do cabecalho
        foreach ($header as $key=> $field){
            $new_line[$key] = isset($row[$key]) ? $row[$key] : $empty_cell_indicator;
        }
        //adiciona nova linha ao array de conteudo doa rquivo
        $file_content[] = ($new_line);
    }

    //retorna o array de conteuo do arquivo
    return $file_content;
}