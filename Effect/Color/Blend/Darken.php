<?php

namespace LazyBitmap\Effect\Color\Blend;

use LazyBitmap\Effect\Color\Blend;

class Darken extends Blend {

    public static function calculateColor($bottom, $top) {
        return min($top, $bottom);
    }

}
