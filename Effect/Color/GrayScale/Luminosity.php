<?php

namespace LazyBitmap\Effect\Color\GrayScale;

use LazyBitmap\Bitmap;

class Luminosity extends Bitmap {

    public function getPixel($x, $y) {
        $pixel = parent::getPixel($x, $y);
        $color = (0.21 * $pixel->red) + (0.71 * $pixel->green) + (0.07 * $pixel->blue);
        $pixel->setColor($color, $color, $color);
        return $pixel;
    }

}
