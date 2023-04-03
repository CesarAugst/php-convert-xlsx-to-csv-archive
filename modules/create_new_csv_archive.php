<?php
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