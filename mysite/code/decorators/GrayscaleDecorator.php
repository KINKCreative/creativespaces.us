<?php
 
class GrayscaleDecorator extends DataExtension
{

/* Greyscale image */
public function GreyscaleImage($RGB = '100 100 100') 
{
    return $this->owner->getFormattedImage('GreyscaleImage', $RGB);
}
 
public function generateGreyscaleImage(GD $gd, $RGB) 
{
    $Vars = explode(' ', $RGB);     
    return $gd->greyscale( $Vars[0], $Vars[1], $Vars[2]);
}

public function generateScaledGreyscaleImage(GD $gd, $width, $RGB) 
{
    $Vars = explode(' ', $RGB);     
    return $gd->resizeByWidth($width)->greyscale( $Vars[0], $Vars[1], $Vars[2]);
}

public function ScaledGreyscaleImage($width=732, $RGB = '100 100 100') 
{
    return $this->owner->getFormattedImage('ScaledGreyscaleImage', $width, $RGB);
}

public function GreyPaddedImage($width, $height) {
	return $this->owner->getFormattedImage('GreyPaddedImage', $width, $height);
}

public function generateGreyPaddedImage(GD $gd, $width, $height) {
  return $gd->paddedResize($width, $height, '333333');
} 

/*
public function getFormattedImage($format, $arg1 = null, $arg2 = null) { 
if($this->ID && $this->Filename && Director::fileExists($this->Filename)) { 
$size = getimagesize(Director::baseFolder() . '/' . $this->getField('Filename')); 
$preserveOriginal = false; 
switch(strtolower($format)){ 
case 'croppedimage': 
$preserveOriginal = ($arg1 == $size[0] && $arg2 == $size[1]); 
break; 
case 'croppedfromtopimage': 
$preserveOriginal = ($arg1 == $size[0] && $arg2 == $size[1]); 
break; 
}

if($preserveOriginal){ 
return $this; 
} else { 
return parent::getFormattedImage($format, $arg1, $arg2); 
} 
} 
}
*/ 

/** 
    * Generate a resized copy of this image with the given width & height. Cropped from top-center 
    * Use in templates with $CroppedFromTopImage. 
    */ 
   function generateCroppedFromTopImage(GD $gd, $width, $height) { 
      if(is_numeric($gd) || !$gd){ 
         USER_ERROR("Image::generateFormattedImage - generateCroppedFromTopImage is being called by legacy code or gd is not set.",E_USER_WARNING); 
      }else{ 
          
         if($gd->getWidth() / $gd->getHeight() >= $width/$height){ 
            $gd = $gd->resizeByHeight($height); 
            $left = ($gd->getWidth() - $width)/2; //center cropped image. 
            // if you want to cut from top left or right make $left = 0 or $gd->getWidth - $width respectively 
         }else{ 
            $gd = $gd->resizeByWidth($width);    
            $left = 0; 
         } 
         return $gd->crop(0, $left, $width, $height); 
      } 
   } 

public function CroppedFromTopImage($width, $height) 
{
    return $this->owner->getFormattedImage('CroppedFromTopImage', $width, $height);
}


}