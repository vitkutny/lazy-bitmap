<?php

namespace LazyBitmap\Operation;

require_once __DIR__ . '/../Bitmap.php';
require_once __DIR__ . '/../ILazyBitmap.php';
require_once __DIR__ . '/../Pixel.php';

use LazyBitmap\Bitmap;
use LazyBitmap\ILazyBitmap;

class Shift extends Bitmap implements ILazyBitmap {

    private $x;
    private $y;

    public function __construct(ILazyBitmap $lbm, $x, $y) {
        $this->lbm = $lbm;
        $this->x = $x;
        $this->y = $y;
    }

    public function getPixel($x, $y) {
        $oldX = $x - $this->x;
        $oldY = $y - $this->y;
        if (-1 < $oldX && $oldX < $this->getWidth() && -1 < $oldY && $oldY < $this->getHeight()) {
            return parent::getPixel($oldX, $oldY);
        } else {
            $pixel = parent::getPixel($x, $y);
            $pixel->setColor();
            return $pixel;
        }
    }

}
