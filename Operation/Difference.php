<?php

namespace LazyBitmap\Operation;

use LazyBitmap\Bitmap;
use LazyBitmap\ILazyBitmap;

class Difference extends Bitmap implements ILazyBitmap {

    private $lbmDiff;
    private $difference;

    public function __construct(ILazyBitmap $lbm, ILazyBitmap $lbmDiff, $difference) {
        $this->lbm = $lbm;
        $this->lbmDiff = $lbmDiff;
        $this->difference = $difference;
    }

    public function getPixel($x, $y) {
        $pixel = parent::getPixel($x, $y);
        if ($x >= $this->lbmDiff->getWidth() || $y >= $this->lbmDiff->getHeight()) {
            return $pixel;
        }
        $pixelDiff = $this->lbmDiff->getPixel($x, $y);
        if (
                abs($pixel->red - $pixelDiff->red) < $this->difference &&
                abs($pixel->green - $pixelDiff->green) < $this->difference &&
                abs($pixel->blue - $pixelDiff->blue) < $this->difference
        ) {
            $pixel->disable();
        }
        return $pixel;
    }

}
