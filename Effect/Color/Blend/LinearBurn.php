<?php

namespace LazyBitmap\Effect\Color\Blend;

use LazyBitmap\Effect\Color\Blend;
use LazyBitmap\Effect\Color\Blend\Substract;

class LinearBurn extends Blend {

    public static function calculateColor($bottom, $top) {
        return Substract::calculateColor($bottom, $top);
    }

}
