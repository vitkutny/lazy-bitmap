<?php

namespace LazyBitmap\Operation;

use LazyBitmap\Bitmap;
use LazyBitmap\ILazyBitmap;

class Unification extends Bitmap implements ILazyBitmap {

    private $lbms;
    private $limitTemp;

    public function __construct(ILazyBitmap $lbm) {
        $this->lbm = $lbm;
        $this->lbms = array_reverse(func_get_args());
        $this->limitTemp = ini_get('max_execution_time');
        ini_set('max_execution_time', 10000000);
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

    public function __destruct() {
        ini_set('max_execution_time', $this->limitTemp);
    }

}
