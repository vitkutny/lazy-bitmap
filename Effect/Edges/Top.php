<?php

namespace LazyBitmap\Effect\Edges;

use LazyBitmap\Bitmap;
use LazyBitmap\ILazyBitmap;
use LazyBitmap\Operation\Difference;
use LazyBitmap\Operation\Shift;

class Top extends Bitmap {

    public function __construct(ILazyBitmap $lbm, $size = 1, $difference = 30) {
        $shift = new Shift($lbm, 0, $size);
        $difference = new Difference($lbm, $difference, $shift);
        $this->lbm = $difference;
    }

}
