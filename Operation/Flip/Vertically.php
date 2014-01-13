<?php

namespace LazyBitmap\Operation\Flip;

use LazyBitmap\Bitmap;

class Vertically extends Bitmap {

    public function getPixel($x, $y) {
        return parent::getPixel($x, $this->getHeight() - 1 - $y);
    }

}
