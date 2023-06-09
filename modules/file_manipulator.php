<?php

class FileManipulator{

    //desc: responsavel por receber o arquivo da requisicao
    //params: (array) arquivos recebidos da requisicao
    //return: nenhum
    static public function upload($files_array, $path = 'uploads/'){
        //se recebeu algum arquivo
        if(count($files_array) > 0){
            //armazena o meta-data do arquivo
            $file = $files_array['file'];
            //separa nome e extensao do arquivo
            $file_name = explode('.', $file['name']);
            //pega somente a extensao
            $extension = end($file_name);
            //array de tipos validos
            $valid_file_tipes = array("csv", "xls", "xlsx");
            //se nao for do tipo aceito para execucao
            if(!in_array($extension, $valid_file_tipes)){
                //encerra a execucao
                die();
            }
            //nome e data com hash
            $name_hasehd = md5(implode(".", $file_name).date("Ymdhis"));
            //se o caminho do diretorio nao existir
            if(!is_dir($path)){
                //cria o diretorio
                mkdir($path, 0755);
            }
            //faz upload do arquivo (falta hash)
            move_uploaded_file($file['tmp_name'], $path.$name_hasehd.".".$extension);
            //retorna o nome do arquivo e a extensao
            return array("file_name" =>$name_hasehd, "file_extension" => $extension);
        }
        //retorna nulo
        return null;
    }

    //desc: responsavel por remover o arquivo
    //params: (string) caminho do arquivo
    //return: status da operacao
    static public function delete($path){
        //retorna o status de exclusao doa rquivo solicitado
        return unlink($path);
    }
}
