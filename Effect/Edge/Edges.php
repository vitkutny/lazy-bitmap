<?php

namespace LazyBitmap\Effect\Edge;

use LazyBitmap\Bitmap;
use LazyBitmap\ILazyBitmap;
use LazyBitmap\Effect\Edge\TopLeftEdge;
use LazyBitmap\Effect\Edge\BottomLeftEdge;
use LazyBitmap\Effect\Edge\RightEdge;
use LazyBitmap\Operation\Unification;

class Edges extends Bitmap implements ILazyBitmap {

    public function __construct(ILazyBitmap $lbm, $size = 1, $difference = 30) {
        $topLeft = new TopLeftEdge($lbm, $size, $difference);
        $bottomLeft = new BottomLeftEdge($lbm, $size, $difference);
        $right = new RightEdge($lbm, $size, $difference);
        $this->lbm = new Unification($topLeft, $bottomLeft, $right);
    }

}
