<?php

namespace LazyBitmap\Effect\Color\Blend;

use LazyBitmap\Effect\Color\Blend;
use LazyBitmap\Effect\Color\Blend\Reflect;

class Glow extends Blend {

    public static function calculateColor($bottom, $top) {
        return Reflect::calculateColor($top, $bottom);
    }

}
