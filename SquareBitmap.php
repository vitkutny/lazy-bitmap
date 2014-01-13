<?php

namespace LazyBitmap;

require_once __DIR__ . '/Bitmap.php';
require_once __DIR__ . '/ILazyBitmap.php';
require_once __DIR__ . '/Pixel.php';

use LazyBitmap\Bitmap;
use LazyBitmap\ILazyBitmap;
use LazyBitmap\Pixel;

class SquareBitmap extends Bitmap implements ILazyBitmap {

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
