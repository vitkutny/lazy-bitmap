<?php

namespace LazyBitmap\Effect\Color\Overlay;

require_once __DIR__ . '/../../../Bitmap.php';
require_once __DIR__ . '/../../../ILazyBitmap.php';

use LazyBitmap\Bitmap;
use LazyBitmap\ILazyBitmap;

abstract class Overlay extends Bitmap {

    public function __construct(ILazyBitmap $lbm) {
        $this->lbm = $lbm;
    }

}
