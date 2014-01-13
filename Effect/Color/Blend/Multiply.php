<?php

namespace LazyBitmap\Effect\Color\Blend;

use LazyBitmap\Effect\Color\Blend;

class Multiply extends Blend {

    public static function calculateColor($bottom, $top) {
        return $top * $bottom / 255;
    }

}
