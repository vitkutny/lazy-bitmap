<?php

namespace LazyBitmap\Effect\Color\Blend;

use LazyBitmap\Effect\Color\Blend;

class Substract extends Blend {

    public static function calculateColor($bottom, $top) {
        return ($top + $bottom < 255) ? 0 : $top + $bottom - 255;
    }

}
