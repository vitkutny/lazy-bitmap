<?php

namespace LazyBitmap\Effect\Color\Blend;

use LazyBitmap\Effect\Color\Blend;

class Lighten extends Blend {

    public static function calculateColor($bottom, $top) {
        return max($top, $bottom);
    }

}
