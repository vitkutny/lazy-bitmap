<?php

namespace LazyBitmap\Operation;

use LazyBitmap\Bitmap;
use LazyBitmap\ILazyBitmap;

class Shift extends Bitmap {

    private $x;
    private $y;

    public function __construct(ILazyBitmap $lbm, $x, $y) {
        parent::__construct($lbm);
        $this->x = $x;
        $this->y = $y;
    }

    public function getPixel($x, $y) {
        $newX = $x - $this->x;
        $newY = $y - $this->y;
        if (-1 < $newX && $newX < $this->getWidth() && -1 < $newY && $newY < $this->getHeight()) {
            return parent::getPixel($newX, $newY);
        } else {
            $pixel = parent::getPixel($x, $y);
            $pixel->disable();
            return $pixel;
        }
    }

}
