<?php

namespace LazyBitmap\Effect\Color\Blend;

use LazyBitmap\Effect\Color\Blend;
use LazyBitmap\Effect\Color\Blend\Darken;
use LazyBitmap\Effect\Color\Blend\Lighten;

class PinLight extends Blend {

    public static function calculateColor($bottom, $top) {
        return ($bottom < 128) ? Darken::calculateColor($top, (2 * $bottom)) : Lighten::calculateColor($top, (2 * ($bottom - 128)));
    }

}
