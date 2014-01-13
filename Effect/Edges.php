<?php

namespace LazyBitmap\Effect;

use LazyBitmap\Bitmap;
use LazyBitmap\ILazyBitmap;
use LazyBitmap\Effect\Edges\TopLeft;
use LazyBitmap\Effect\Edges\BottomLeft;
use LazyBitmap\Effect\Edges\Right;
use LazyBitmap\Operation\Unification;

class Edges extends Bitmap {

    public function __construct(ILazyBitmap $lbm, $size = 1, $difference = 30) {
        $topLeft = new TopLeft($lbm, $size, $difference);
        $bottomLeft = new BottomLeft($lbm, $size, $difference);
        $right = new Right($lbm, $size, $difference);
        $this->lbm = new Unification($topLeft, $bottomLeft, $right);
    }

}
