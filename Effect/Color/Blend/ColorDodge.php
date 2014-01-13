<?php

namespace LazyBitmap\Effect\Color\Blend;

use LazyBitmap\Effect\Color\Blend;

class ColorDodge extends Blend {

    public static function calculateColor($bottom, $top) {
        return ($bottom == 255) ? $bottom : min(255, (($top << 8 ) / (255 - $bottom)));
    }

}
