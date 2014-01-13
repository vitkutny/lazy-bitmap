<?php

namespace LazyBitmap\Effect\Color;

use LazyBitmap\Bitmap;
use LazyBitmap\ILazyBitmap;
use LazyBitmap\Exception;

class BlackWhite extends Bitmap implements ILazyBitmap {

    private $percent;

    public function __construct(ILazyBitmap $lbm, $percent = 50) {
        $this->lbm = $lbm;
        if ($percent < 0 || $percent > 100) {
            throw new Exception('Percents must be in range from 0 to 100.');
        }
        $this->percent = $percent;
    }

    public function getPixel($x, $y) {
        $pixel = parent::getPixel($x, $y);
        if (!$this->percent || $pixel->getAverage() > 255 / (100 / $this->percent)) {
            $pixel->setColor(255, 255, 255);
        } else {
            $pixel->setColor();
        }
        return $pixel;
    }

}
