<?php

namespace LazyBitmap\Effect\Edge;

use LazyBitmap\Bitmap;
use LazyBitmap\ILazyBitmap;
use LazyBitmap\Operation\Difference;
use LazyBitmap\Operation\Shift;

class BottomRightEdge extends Bitmap implements ILazyBitmap {

    public function __construct(ILazyBitmap $lbm, $size = 1, $difference = 30) {
        $shift = new Shift($lbm, -$size, -$size);
        $difference = new Difference($lbm, $shift, $difference);
        $this->lbm = $difference;
    }

}
