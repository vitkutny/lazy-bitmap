<?php

namespace LazyBitmap\Effect\Color;

require_once __DIR__ . '/../../Bitmap.php';
require_once __DIR__ . '/../../ILazyBitmap.php';

use LazyBitmap\Bitmap;
use LazyBitmap\ILazyBitmap;

class Negative extends Bitmap implements ILazyBitmap {

    public function __construct(ILazyBitmap $lbm) {
        $this->lbm = $lbm;
    }

    public function getPixel($x, $y) {
        $pixel = parent::getPixel($x, $y);
        $pixel->setColor(255 - $pixel->red, 255 - $pixel->green, 255 - $pixel->blue);
        return $pixel;
    }

}
