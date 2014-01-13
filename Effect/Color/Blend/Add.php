<?php

namespace LazyBitmap\Effect\Color\Blend;

use LazyBitmap\Effect\Color\Blend;

class Add extends Blend {

    public static function calculateColor($bottom, $top) {
        return min(255, $top + $bottom);
    }

}
