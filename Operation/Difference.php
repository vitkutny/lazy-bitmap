<?php

namespace LazyBitmap\Operation;

use LazyBitmap\Bitmap;
use LazyBitmap\ILazyBitmap;

class Difference extends Bitmap {

    private $lbms;
    private $difference;

    public function __construct(ILazyBitmap $lbm, $difference) {
        $this->lbms = func_get_args();
        parent::__construct(array_shift($this->lbms));
        $this->difference = array_shift($this->lbms);
        foreach ($this->lbms as $lbm) {
            if (!$lbm instanceof ILazyBitmap) {
                throw new Exception('All arguments after \'$difference\' passed to ' . __METHOD__ . ' must implement interface LazyBitmap\ILazyBitmap.');
            }
        }
    }

    public function getPixel($x, $y) {
        $pixel = parent::getPixel($x, $y);
        foreach ($this->lbms as $lbm) {
            if ($x >= $lbm->getWidth() || $y >= $lbm->getHeight()) {
                continue;
            }
            $pixelDiff = $lbm->getPixel($x, $y);
            if (
                    abs($pixel->red - $pixelDiff->red) < $this->difference &&
                    abs($pixel->green - $pixelDiff->green) < $this->difference &&
                    abs($pixel->blue - $pixelDiff->blue) < $this->difference
            ) {
                $pixel->disable();
                break;
            }
        }
        return $pixel;
    }

}
