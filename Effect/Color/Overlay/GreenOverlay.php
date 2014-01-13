<?php

namespace LazyBitmap\Effect\Color\Overlay;

use LazyBitmap\Effect\Color\Overlay\Overlay;
use LazyBitmap\ILazyBitmap;

class GreenOverlay extends Overlay implements ILazyBitmap {

    public function getPixel($x, $y) {
        $pixel = parent::getPixel($x, $y);
        $pixel->setColor(0, $pixel->green);
        return $pixel;
    }

}
