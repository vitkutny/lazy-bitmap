<?php

namespace LazyBitmap\Effect\Color\Blend;

use LazyBitmap\Effect\Color\Blend;
use LazyBitmap\Effect\Color\Blend\Overlay;

class HardLight extends Blend {

    public static function calculateColor($bottom, $top) {
        return Overlay::calculateColor($top, $bottom);
    }

}
