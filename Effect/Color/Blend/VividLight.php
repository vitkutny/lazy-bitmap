<?php

namespace LazyBitmap\Effect\Color\Blend;

use LazyBitmap\Effect\Color\Blend;
use LazyBitmap\Effect\Color\Blend\ColorBurn;
use LazyBitmap\Effect\Color\Blend\ColorDodge;

class VividLight extends Blend {

    public static function calculateColor($bottom, $top) {
        return ($bottom < 128) ? ColorBurn::calculateColor($top, (2 * $bottom)) : ColorDodge::calculateColor($top, (2 * ($bottom - 128)));
    }

}
