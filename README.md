# php-convert-xlsx-to-csv-archive
Projeto desenvolvido com o intuito de receber arquivos xlsx e converter para arquivos csv

## Como executar
- primeiramente usar o comando ```composer update``` para gerar o diretório /vendor

## Bibliotecas utilizadas
- [arkne/xl-reader](https://github.com/Ark4ne/xl-reader)
  - *Comando de instalação:* ```composer require arkne/xl-reader```

- [phpoffice/phpspreadsheet](https://github.com/phpoffice/phpspreadsheet)
  - *Comando de instalação:* ```composer require phpoffice/phpspreadsheet```
  - *Informações adicionais:* foi necessario habilitar as extensoes ```extension=fileinfo``` e ```extension=gd2``` no php.ini