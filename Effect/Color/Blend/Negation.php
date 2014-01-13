<?php

namespace LazyBitmap\Effect\Color\Blend;

use LazyBitmap\Effect\Color\Blend;

class Negation extends Blend {

    public static function calculateColor($bottom, $top) {
        return 255 - abs(255 - $top - $bottom);
    }

}
