<?php

namespace LazyBitmap\Effect\Color\Blend;

use LazyBitmap\Effect\Color\Blend;

class Exclusion extends Blend {

    public static function calculateColor($bottom, $top) {
        return $top + $bottom - 2 * $top * $bottom / 255;
    }

}
