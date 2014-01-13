<?php

namespace LazyBitmap\Effect\Color\Blend;

use LazyBitmap\Effect\Color\Blend;
use LazyBitmap\Effect\Color\Blend\Multiply;
use LazyBitmap\Effect\Color\Blend\Screen;

class Overlay extends Blend {

    public static function calculateColor($bottom, $top) {
        if ($bottom < 128) {
            return 2 * Multiply::calculateColor($bottom, $top);
        } else {
            return (2 * Screen::calculateColor($bottom, $top)) - 255;
        }
    }

}
