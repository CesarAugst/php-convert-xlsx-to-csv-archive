# php-convert-xlsx-to-csv-archive
Como o projeto funciona: O projeto base recebe um arquivo XLSX e faz a conversão para CVS. O intuito do projeto base é ser usado como micro-serviço (não implementado)

## Como executar
- primeiramente usar o comando ```composer update``` para gerar o diretório /vendor
- o arquivo atual para realizar a conversão é o phpspreadsheet.php, executeele para gerar a conversao
- a fins de performace, o mais recomendado é o arquivoxl-reader.php

## Bibliotecas utilizadas
- [phpoffice/phpspreadsheet](https://github.com/phpoffice/phpspreadsheet)
  - *Comando de instalação:* ```composer require phpoffice/phpspreadsheet```
  - *Informações adicionais:* foi necessario habilitar as extensoes ```extension=fileinfo``` e ```extension=gd2``` no php.ini

- [arkne/xl-reader](https://github.com/Ark4ne/xl-reader)
  - Biblioteca compativel apenas com arquivos .xlsx
  - *Comando de instalação:* ```composer require arkne/xl-reader```
