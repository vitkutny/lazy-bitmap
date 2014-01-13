<?php

namespace LazyBitmap\Effect\Color\Blend;

use LazyBitmap\Effect\Color\Blend;
use LazyBitmap\Effect\Color\Blend\Add;

class LinearDodge extends Blend {

    public static function calculateColor($bottom, $top) {
        return Add::calculateColor($bottom, $top);
    }

}
