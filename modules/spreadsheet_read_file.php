<?php
//desc: faz a leitura de arquivo xlsx e converte em array
//params: (string) nome do arquivo, (string)
//return: (array) conteudo do arquivo
function spreadsheet_read_file($file_name){
    //separa nome do arquivo da extensao
    $array_file_name = explode('.', $file_name);
    //pega somente a extensao
    $extension = end($array_file_name);

    //se for do formato xlz
    if('xls' == $extension){
        //recebe funcao de xls para ler os dados do arquivo
        $reader = new PhpOffice\PhpSpreadsheet\Reader\Xls();
        //se for do formato xlsx
    }elseif ('xlsx' == $extension) {
        //recebe funcao de xlsx para ler os dados do arquivo
        $reader = new PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    }elseif('csv' == $extension){
        //recebe funcao de csv para ler os dados do arquivo
        $reader = new PhpOffice\PhpSpreadsheet\Reader\Csv();
        //outros formatos nao sao validos
    }else{
        return null;
    }
    //prepara para leitura do arquivo
    $reader = $reader->load($file_name);
    //converte os dados em array
    $file_content = $reader->getActiveSheet()->toArray();

    //retorna o array de conteuo do arquivo
    return $file_content;
}
