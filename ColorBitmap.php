<?php

namespace LazyBitmap;

use LazyBitmap\Bitmap;
use LazyBitmap\Pixel;

class ColorBitmap extends Bitmap {

    private $width;
    private $height;
    private $color;

    public function __construct($width, $height, $red = 0, $green = 0, $blue = 0, $alpha = 0) {
        $this->width = $width;
        $this->height = $height;
        $this->color = array(
            'red' => $red,
            'green' => $green,
            'blue' => $blue,
            'alpha' => $alpha
        );
    }

    public function getPixel($x, $y) {
        $pixel = new Pixel();
        $pixel->fromArray($this->color);
        return $pixel;
    }

    public function getWidth() {
        return $this->width;
    }

    public function getHeight() {
        return $this->height;
    }

}
