# Bibliotecas do André

Listagem completa de todas as libraries utilizadas.

* MakImage - Adiciona mascara na imagem, atualmente só usa jpg mascara em png.
* Ferramentas - Recursos prontos para adotar no librarie do Joomla
* Snippets Aton - varios recursos prontos para uso Yii2 e doctype

## MakImage

````php
<?php

MaskImage::MaskImage('path/to/file.jpg');

````

## snippets Aton
````
// inserir no C:\Users\Usuario\.atom
snippets.cson
````

## Snippet Visual Studio Code
````
// acrescentar no C:\Users\usuario\AppData\Roaming\Code\User\snippets
php.json pelo conteúdo de sniooets-php-VS-Code.json
````

## Snippet Sublime
````
// adicionar na pasta C:\Users\usuario\AppData\Roaming\Sublime Text 3\Packages\User
sublime-snippets-yii/
````

## Ferramentas

````php
<?php
//use assim
JLoader::register('Ferramentas', JPATH_LIBRARIES . '/Ferramentas.php');
//um dos itens que consta no elemento 
Ferramentas::SetJsfile('teste.js','HEAD');
