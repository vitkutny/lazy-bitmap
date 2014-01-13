<?php

namespace LazyBitmap\Effect\Color\Blend;

use LazyBitmap\Effect\Color\Blend;

class Difference extends Blend {

    public static function calculateColor($bottom, $top) {
        return abs($top - $bottom);
    }

}
