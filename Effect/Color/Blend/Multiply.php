<?php

namespace LazyBitmap\Effect\Color\Blend;

use LazyBitmap\Effect\Color\Blend;
use LazyBitmap\ILazyBitmap;

class Multiply extends Blend implements ILazyBitmap {

    public static function calculateColor($bottom, $top) {
        return $top * $bottom / 255;
    }

}
