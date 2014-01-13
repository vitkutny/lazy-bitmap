<?php

namespace LazyBitmap;

use LazyBitmap\Bitmap;
use LazyBitmap\ILazyBitmap;
use LazyBitmap\Pixel;

class ImageBitmap extends Bitmap implements ILazyBitmap {

    private $image;
    private $width;
    private $height;

    public function __construct($source) {
        $this->image = imagecreatefromstring(file_get_contents($source));
        $this->width = imagesx($this->image);
        $this->height = imagesy($this->image);
    }

    public function getPixel($x, $y) {
        $index = imagecolorat($this->image, $x, $y);
        $colors = imagecolorsforindex($this->image, $index);
        $pixel = new Pixel;
        $pixel->fromArray($colors);
        return $pixel;
    }

    public function getWidth() {
        return $this->width;
    }

    public function getHeight() {
        return $this->height;
    }

}
