<?php

namespace LazyBitmap;

use LazyBitmap\ILazyBitmap;

abstract class Bitmap implements ILazyBitmap {

    protected $lbm;

    public function getPixel($x, $y) {
        $pixel = $this->lbm->getPixel($x, $y);
        if (!$pixel->isActive()) {
            $pixel->setColor();
        }
        return $pixel;
    }

    public function getWidth() {
        return $this->lbm->getWidth();
    }

    public function getHeight() {
        return $this->lbm->getHeight();
    }

    public function getImage(){
        $image = imagecreatetruecolor($this->getWidth(), $this->getHeight());

        imagesavealpha($image, true);
        imagefill($image, 0, 0, imagecolorallocatealpha($image, 0, 0, 0, 127));

        for ($y = 0; $y < $this->getHeight(); $y++) {
            for ($x = 0; $x < $this->getWidth(); $x++) {
                $pixel = $this->getPixel($x, $y);
                $color = imagecolorallocatealpha($image, $pixel->red, $pixel->green, $pixel->blue, $pixel->alpha);
                imagesetpixel($image, $x, $y, $color);
            }
        }

        return $image;
    }

    public function render() {
        $image = $this->getImage();
        header('Content-Type: image/png');
        imagepng($image);
        imagedestroy($image);
    }

    public function save($file) {
        $image = $this->getImage();
        imagepng($image, $file);
        imagedestroy($image);
    }

}
