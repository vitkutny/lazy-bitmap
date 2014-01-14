<?php

namespace LazyBitmap\Effect\Color\Blend;

use LazyBitmap\Effect\Color\Blend;
use LazyBitmap\Pixel;

class Color extends Blend {

    public function calculatePixel(Pixel $pixel, Pixel $top) {
        $pixelHsl = $pixel->toHsl();
        $topHsl = $top->toHsl();
        $pixel->fromHsl($topHsl['h'], $topHsl['s'], $pixelHsl['l']);
        return $pixel;
    }

}
