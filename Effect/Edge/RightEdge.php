<?php

namespace LazyBitmap\Effect\Edge;

require_once __DIR__ . '/../../Bitmap.php';
require_once __DIR__ . '/../../ILazyBitmap.php';
require_once __DIR__ . '/../../Operation/Difference.php';
require_once __DIR__ . '/../../Operation/Shift.php';

use LazyBitmap\Bitmap;
use LazyBitmap\ILazyBitmap;
use LazyBitmap\Operation\Difference;
use LazyBitmap\Operation\Shift;

class RightEdge extends Bitmap implements ILazyBitmap {

    public function __construct(ILazyBitmap $lbm, $size = 1, $difference = 30) {
        $shift = new Shift($lbm, -$size, 0);
        $difference = new Difference($lbm, $shift, $difference);
        $this->lbm = $difference;
    }

}
