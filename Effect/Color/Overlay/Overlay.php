<?php

namespace LazyBitmap\Effect\Color\Overlay;

use LazyBitmap\Bitmap;
use LazyBitmap\ILazyBitmap;

abstract class Overlay extends Bitmap {

    private $percent;

    public function __construct(ILazyBitmap $lbm, $percent = 100) {
        $this->lbm = $lbm;
        if ($percent < 0 || $percent > 100) {
            throw new Exception('Percents must be in range from 0 to 100.');
        }
        $this->percent = $percent;
    }

    protected function calculate($color) {
        return $color - ($color * $this->percent / 100);
    }

}
