<?php

namespace LazyBitmap\Operation\Rotation;

use LazyBitmap\Bitmap;

class Left extends Bitmap {

    public function getPixel($x, $y) {
        return parent::getPixel($this->getHeight() - 1 - $y, $x);
    }

    public function getWidth() {
        return parent::getHeight();
    }

    public function getHeight() {
        return parent::getWidth();
    }

}
