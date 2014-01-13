<?php

namespace LazyBitmap\Effect\Color\Blend;

use LazyBitmap\Effect\Color\Blend;
use LazyBitmap\Effect\Color\Blend\LinearBurn;
use LazyBitmap\Effect\Color\Blend\LinearDodge;

class LinearLight extends Blend {

    public static function calculateColor($bottom, $top) {
        return ($bottom < 128) ? LinearBurn::calculateColor($top, (2 * $bottom)) : LinearDodge::calculateColor($top, (2 * ($bottom - 128)));
    }

}
