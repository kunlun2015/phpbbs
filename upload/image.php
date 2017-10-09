<?php
/**
 * 图片处理
 * @authors: Amos (735767227@qq.com)
 * @date: 2017-08-04 14:55
 * @version $Id$
 */
 error_reporting(E_ALL);
 ini_set('display_errors', '1');
 require_once dirname(__FILE__).'/../vendor/kosinix/grafika/src/autoloader.php';
 use Grafika\Grafika;

 $path = $_GET['path'];
 $size = $_GET['size'];
 $filePath = dirname(__FILE__).'/'.$path;
 if(!file_exists($filePath)){
    exit('file not found!');
 }
 $editor = Grafika::createEditor();
 header('Content-type: image/jpg');
 $sizeArr = $size ? explode('_', $size) : [];
 if(!$sizeArr){
     $editor->open($image, $filePath);
 }else{
     $width = (int)$sizeArr[0];
     $height = isset($sizeArr[1]) ? (int)$sizeArr[1] : 0;
     if($width && $height){
         $editor->resizeFit($image , $width, $height);
     }elseif($width){
         $editor->resizeExactWidth($image , $width);
     }
 }
 $image->blob('PNG');
