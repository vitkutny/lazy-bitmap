<?php

namespace LazyBitmap\Effect\Color;

use LazyBitmap\Bitmap;
use LazyBitmap\ILazyBitmap;
use LazyBitmap\Pixel;

abstract class Blend extends Bitmap implements ILazyBitmap {

    protected $pixel;

    public function __construct(ILazyBitmap $lbm, $red = 0, $green = 0, $blue = 0) {
        $this->lbm = $lbm;
        if (min($red, $green, $blue) < 0 || max($red, $green, $blue) > 255) {
            throw new Exception('Colors must be in range from 0 to 255.');
        }
        $this->pixel = new Pixel($red, $green, $blue);
    }

    public function getPixel($x, $y) {
        $pixel = parent::getPixel($x, $y);
        return $this->calculatePixel($pixel, $this->pixel);
    }

    public function calculatePixel(Pixel $pixel, Pixel $top) {
        $pixel->red = $this->calculateColor($pixel->red, $top->red);
        $pixel->green = $this->calculateColor($pixel->green, $top->green);
        $pixel->blue = $this->calculateColor($pixel->blue, $top->blue);
        return $pixel;
    }

}
