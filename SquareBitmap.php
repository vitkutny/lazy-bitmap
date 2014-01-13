<?php

namespace LazyBitmap;

use LazyBitmap\Bitmap;
use LazyBitmap\Pixel;

class SquareBitmap extends Bitmap {

    private $relativeSize;
    private $width;
    private $height;

    public function __construct($relativeSize, $width, $height) {
        $this->relativeSize = (1 - $relativeSize) / 2;
        $this->width = $width;
        $this->height = $height;
    }

    public function getPixel($x, $y) {
        if ($this->width * $this->relativeSize <= $x &&
                $x < $this->width * (1 - $this->relativeSize) &&
                $this->height * $this->relativeSize <= $y &&
                $y < $this->height * (1 - $this->relativeSize)
        ) {
            return new Pixel(255, 255, 255);
        } else {
            return new Pixel;
        }
    }

    public function getWidth() {
        return $this->width;
    }

    public function getHeight() {
        return $this->height;
    }

}
