<?php

namespace LazyBitmap\Effect\Color\Blend;

use LazyBitmap\Effect\Color\Blend;

class SoftLight extends Blend {

    public static function calculateColor($bottom, $top) {
        return ($bottom < 128) ? (2 * (($top >> 1) + 64)) * ((float) $bottom / 255) : (255 - (2 * (255 - (($top >> 1) + 64)) * (float) (255 - $bottom) / 255));
    }

}
