<?php

namespace LazyBitmap\Effect\Color\Overlay;

use LazyBitmap\Bitmap;
use LazyBitmap\ILazyBitmap;

abstract class Overlay extends Bitmap {

    public function __construct(ILazyBitmap $lbm) {
        $this->lbm = $lbm;
    }

}
