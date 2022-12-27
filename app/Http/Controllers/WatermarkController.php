<?php

namespace App\Http\Controllers;

use Imagick;

class WatermarkController extends Controller
{
    public function watermark() {
        $image = new Imagick();
        $image->readImage(getcwd(). "/upload/images/msk-rb-106 igrovoj-kompleks-simvol.png");

        $watermark = new Imagick();
        $watermark->readImage(getcwd(). "/upload/watermarks/2016-LeberGroup_Logo-element.png");

        $watermarkResizeFactor = 1;

        $img_Width = $image->getImageWidth();
        $img_Height = $image->getImageHeight();
        //$watermark_Width = $watermark->getImageWidth();
        //$watermark_Height = $watermark->getImageHeight();

        //$watermark->scaleImage($watermark_Width / $watermarkResizeFactor, $watermark_Height / $watermarkResizeFactor);

        $watermark_Width = $watermark->getImageWidth();
        $watermark_Height = $watermark->getImageHeight();

        $x = ($img_Width - $watermark_Width);
        $y = ($img_Height - $watermark_Height);

        $image->compositeImage($watermark, Imagick::COMPOSITE_OVER, $x, $y);

        $fuzz = 0.1;

        $max = $image->getQuantumRange();
        $max = $max["quantumRangeLong"];

        $image->trimImage($fuzz * $max);
        $image->transparentPaintImage($image->getImagePixelColor(0, 0), 0, $fuzz * $max, FALSE);

        header('Content-Type: image/png');
        $image = $image->getImageBlob();

        echo $image;

        return view('watermark.index', ['image' => $image]);
    }
}