<?php

namespace LazyBitmap\Effect\Color\GrayScale;

use LazyBitmap\Bitmap;

class Average extends Bitmap {

    public function getPixel($x, $y) {
        $pixel = parent::getPixel($x, $y);
        $color = $pixel->getAverage();
        $pixel->setColor($color, $color, $color);
        return $pixel;
    }

}
