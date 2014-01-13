<?php

namespace LazyBitmap\Operation;

use LazyBitmap\Bitmap;
use LazyBitmap\ILazyBitmap;
use LazyBitmap\Exception;

class Unification extends Bitmap {

    private $lbms;
    private $blend;

    public function __construct(ILazyBitmap $lbm, $method = NULL) {
        $this->lbms = func_get_args();
        parent::__construct(array_shift($this->lbms));
        $method = (is_string($method)) ? array_shift($this->lbms) : 'Normal';
        $blend = 'LazyBitmap\\Effect\\Color\\Blend\\' . $method;
        $this->blend = new $blend($this->lbm);
        foreach ($this->lbms as $lbm) {
            if (!$lbm instanceof ILazyBitmap) {
                throw new Exception('All arguments passed to ' . __METHOD__ . ' must implement interface LazyBitmap\ILazyBitmap.');
            }
        }
    }

    public function getPixel($x, $y) {
        $pixel = parent::getPixel($x, $y);
        foreach ($this->lbms as $lbm) {
            if ($x >= $lbm->getWidth() || $y >= $lbm->getHeight()) {
                continue;
            }
            $top = $lbm->getPixel($x, $y);
            if ($top->isActive()) {
                return $this->blend->calculatePixel($top, $pixel);
            }
        }
        return $pixel;
    }

}
