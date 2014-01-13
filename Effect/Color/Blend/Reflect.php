<?php

namespace LazyBitmap\Effect\Color\Blend;

use LazyBitmap\Effect\Color\Blend;

class Reflect extends Blend {

    public static function calculateColor($bottom, $top) {
        return ($bottom == 255) ? $bottom : min(255, ($top * $top / (255 - $bottom)));
    }

}
