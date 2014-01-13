<?php

namespace LazyBitmap\Effect\Color\Overlay;

use LazyBitmap\Effect\Color\Overlay\Overlay;
use LazyBitmap\ILazyBitmap;

class GrayOverlay extends Overlay implements ILazyBitmap {

    public function getPixel($x, $y) {
        $pixel = parent::getPixel($x, $y);
        $color = $pixel->getAverage();
        $pixel->setColor($color, $color, $color);
        return $pixel;
    }

}
