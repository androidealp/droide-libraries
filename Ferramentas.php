<?php
/**
 * @package      Ferramentas
 * JLoader::register('Ferramentas', JPATH_LIBRARIES . '/Ferramentas.php');
 * Ferramentas::SetJsfile('teste.js','HEAD');
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author     André Luiz Pereira <[<andre@next4.com.br>]>
 */
class Ferramentas
{

  private static $jsfiles = [];
  private static $jsposition = 'HEAD';
  private static $positions = [
    'HEAD'=>1,
    'BODY_TOP'=>2,
    'BODY_END'=>3,
  ];
  private static $params = ['type'=>'','content'=>['media','text','position']];



  public function TratarFields($html)
  {
    $dom = new DOMDocument;
   $checkbox = "";
   $dom->loadHTML($html);
   $select = $dom->getElementsByTagName('select');
   $contents = $dom->getElementsByTagName('option');
   $getLabel = $dom->getElementsByTagName('label');
   $boxFiltro = [];
   for ($i=0; $i < $contents->length; $i++) {
     $valor_nome = '';

     if(strpos($contents->item($i)->textContent,'Select') === false){
       $valor_nome = $contents->item($i)->textContent;
       $checkbox .=  "<li><input type='checkbox' name='".$select->item(0)->getAttribute('name')."' value='".$contents->item($i)->getAttribute('value')."' /> ".$valor_nome.'</li>';
     }

     //$checkbox .= "<li><input type='checkbox' name='".$select->item(0)->getAttribute('name')."' value='".$contents->item($i)->getAttribute('value')."' /> ".$valor_nome.'</li>';
   }

   $label = explode('-',utf8_decode($getLabel->item(0)->textContent));

   $boxFiltro = [
      'checkbox'=>$checkbox,
      'label'=>(isset($label[1]))?$label[1]:$label[0]
     ];

   return $boxFiltro;

  }


  public static function SetJsfile($file, $jsposition,$type='')
  {
    self::$jsposition = $jsposition;
    self::$jsfiles[] = [
      'position'=>$jsposition,
      'file'=>$file,
      'type'=>$type
    ];
  }

  public static function GetJsfile($jsposition)
  {
    $scripts = '';
    foreach (self::$jsfiles as $k => $file) {
      if($file['position'] == $jsposition)
      {
        $scripts .= "<script {$file['type']} src='{$file['file']}' charset='utf-8'></script>";
      }
    }

    return $scripts;


  }

  public static function setParamsLayout($param)
  {
      self::$params['type'] =  'media';
      self::$params['content'] =  ['media'=>'url/sdfsdf', 'text'=>'sdfsdf','position'=>'teaser'];

      self::$params = $param;
  }

  public static function getParamsLayout($type)
  {
      return self::$params;
  }

  public static function hasParams($type)
  {
    if(isset(self::$params[$type])){
      return true;
    }

    return false;
  }


}
