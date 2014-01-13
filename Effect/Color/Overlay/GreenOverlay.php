<?php

namespace LazyBitmap\Effect\Color\Overlay;

use LazyBitmap\Effect\Color\Overlay\Overlay;
use LazyBitmap\ILazyBitmap;

class GreenOverlay extends Overlay implements ILazyBitmap {

    public function getPixel($x, $y) {
        $pixel = parent::getPixel($x, $y);
        $pixel->setColor($this->calculate($pixel->red), $pixel->green, $this->calculate($pixel->blue));
        return $pixel;
    }

}
