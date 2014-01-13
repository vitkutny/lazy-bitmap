<?php

namespace LazyBitmap\Operation\Rotation;

use LazyBitmap\Bitmap;

class Right extends Bitmap {

    public function getPixel($x, $y) {
        return parent::getPixel($y, $this->getWidth() - 1 - $x);
    }

    public function getWidth() {
        return parent::getHeight();
    }

    public function getHeight() {
        return parent::getWidth();
    }

}
