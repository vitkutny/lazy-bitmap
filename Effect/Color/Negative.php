<?php

namespace LazyBitmap\Effect\Color;

use LazyBitmap\Bitmap;

class Negative extends Bitmap {

    public function getPixel($x, $y) {
        $pixel = parent::getPixel($x, $y);
        $pixel->setColor(255 - $pixel->red, 255 - $pixel->green, 255 - $pixel->blue);
        return $pixel;
    }

}
