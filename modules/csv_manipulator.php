<?php
class CsvManipualtor{
    //desc: faz criacao de arquivo csv com base nos dados do arquivo xlsx recebido
    //params: (string) nome do arquivo, (array) dados recebidos
    //return: nenhum
    static public function create_new_file($file_name, $array_to_file_content){
        //abre o arquivo com permissao de escrita
        $archive = fopen("$file_name.csv", 'w');
        //loop com os dados recebidos
        foreach ($array_to_file_content as $row){
            //escreve linha no arquivo separando dados por ;
            fputcsv($archive, $row, ';');
        }
        //fecha o arquivo
        fclose($archive);
        //retorna conteudo do arquivo
        return file_get_contents("$file_name.csv");
    }
}
