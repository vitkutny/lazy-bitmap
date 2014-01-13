<?php

namespace LazyBitmap\Operation;

use LazyBitmap\Bitmap;
use LazyBitmap\ILazyBitmap;

class Unification extends Bitmap implements ILazyBitmap {

    private $lbms;

    public function __construct(ILazyBitmap $lbm) {
        $this->lbm = $lbm;
        $this->lbms = array_reverse(func_get_args());
    }

    public function getPixel($x, $y) {
        foreach ($this->lbms as $lbm) {
            if ($x >= $lbm->getWidth() || $y >= $lbm->getHeight()) {
                continue;
            }
            $pixel = $lbm->getPixel($x, $y);
            if ($pixel->isActive()) {
                return $pixel;
            }
        }
        return $pixel;
    }

}
