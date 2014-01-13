<?php

namespace LazyBitmap\Effect\Color\Blend;

use LazyBitmap\Effect\Color\Blend;

class Phoenix extends Blend {

    public static function calculateColor($bottom, $top) {
        return min($top, $bottom) - max($top, $bottom) + 255;
    }

}
