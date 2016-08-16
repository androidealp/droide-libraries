<?php
define('DIR_IMAGE', 'd:path/to/folder/');
/**
 * ferramentas para tratar as Imagens ICTQ
 * MaskImage::MaskImage('path/to/testemask.jpg');
 *  @author André Luiz Pereira <andre@next4.com.br>
 */
class MaskImage {

  public static function MaskImage($image)
  {
    $mask     = DIR_IMAGE . 'img_mask.png';
    $dest_img = DIR_IMAGE . $image;

    if (is_file($dest_img) && is_file($mask)) {
      $size = getimagesize($mask);
      $sizeFoto =  getimagesize($dest_img);
      $createMask = imagecreatefrompng($mask);
      $createFoto =  imagecreatefromjpeg($dest_img);
      imagealphablending($createMask, true);
      //
      // $background = imagecolorallocate($dest_img, 0, 0, 0);
      // imagecolortransparent($dest_img, $background);
      // imagealphablending($dest_img, false);
      // imagesavealpha($dest_img, true);
      $position_x = $sizeFoto[0]-$size[0]-25;
      $position_Y = $sizeFoto[1]-$size[1]-25;
      imagecopymerge($createFoto, $createMask, $position_x, $position_Y, 0, 0, $size[0], $size[1], 30);

      //parse_url
      $namefale = basename($dest_img);
      $path_ex  = explode($namefale, $dest_img);
      //print_r($path_ex[0]);
        //  Header("Content-type: image/jpeg");
        // // // and finally, output the result
        imagejpeg($createFoto,$dest_img,100); // save image
        //imagejpeg($createFoto,null,100); // view
        //imagedestroy($dest_img);
    } // fim do if
  }

 }
