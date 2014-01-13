<?php

namespace LazyBitmap\Operation\Flip;

use LazyBitmap\Bitmap;

class Horizontally extends Bitmap {

    public function getPixel($x, $y) {
        return parent::getPixel($this->getWidth() - 1 - $x, $y);
    }

}
