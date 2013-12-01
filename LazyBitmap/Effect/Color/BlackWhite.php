<?php

namespace LazyBitmap\Effect\Color;

require_once __DIR__ . '/../../Bitmap.php';
require_once __DIR__ . '/../../ILazyBitmap.php';

use LazyBitmap\Bitmap;
use LazyBitmap\ILazyBitmap;

class BlackWhite extends Bitmap implements ILazyBitmap {

    public function __construct(ILazyBitmap $lbm) {
        $this->lbm = $lbm;
    }

    public function getPixel($x, $y) {
        $pixel = parent::getPixel($x, $y);
        if ($pixel->getAverage() > 127) {
            $pixel->setColor(255, 255, 255);
        } else {
            $pixel->setColor();
        }
        return $pixel;
    }

}