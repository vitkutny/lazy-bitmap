<?php

namespace LazyBitmap\Effect\Edge;

use LazyBitmap\Bitmap;
use LazyBitmap\ILazyBitmap;
use LazyBitmap\Operation\Difference;
use LazyBitmap\Operation\Shift;

class TopEdge extends Bitmap implements ILazyBitmap {

    public function __construct(ILazyBitmap $lbm, $size = 1, $difference = 30) {
        $shift = new Shift($lbm, 0, $size);
        $difference = new Difference($lbm, $shift, $difference);
        $this->lbm = $difference;
    }

}
