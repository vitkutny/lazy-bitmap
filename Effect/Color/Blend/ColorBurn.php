<?php

namespace LazyBitmap\Effect\Color\Blend;

use LazyBitmap\Effect\Color\Blend;

class ColorBurn extends Blend {

    public static function calculateColor($bottom, $top) {
        return ($bottom == 0) ? $bottom : max(0, (255 - ((255 - $top) << 8 ) / $bottom));
    }

}
