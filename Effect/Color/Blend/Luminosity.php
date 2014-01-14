<?php

namespace LazyBitmap\Effect\Color\Blend;

use LazyBitmap\Effect\Color\Blend;
use LazyBitmap\Pixel;

class Luminosity extends Blend {

    public function calculatePixel(Pixel $pixel, Pixel $top) {
        $pixelHsl = $pixel->toHsl();
        $topHsl = $top->toHsl();
        $pixel->fromHsl($pixelHsl['h'], $pixelHsl['s'], $topHsl['l']);
        return $pixel;
    }

}
