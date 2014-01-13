<?php

namespace LazyBitmap\Effect\Color\Blend;

use LazyBitmap\Effect\Color\Blend;
use LazyBitmap\Effect\Color\Blend\VividLight;

class HardMix extends Blend {

    public static function calculateColor($bottom, $top) {
        return (VividLight::calculateColor($top, $bottom) < 128) ? 0 : 255;
    }

}
