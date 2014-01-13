<?php

namespace LazyBitmap\Effect\Color\GrayScale;

use LazyBitmap\Bitmap;

class Lightness extends Bitmap {

    public function getPixel($x, $y) {
        $pixel = parent::getPixel($x, $y);
        $color = (max($pixel->getColor()) + min($pixel->getColor())) / 2;
        $pixel->setColor($color, $color, $color);
        return $pixel;
    }

}
