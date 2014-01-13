<?php

namespace LazyBitmap;

interface ILazyBitmap {

    public function getPixel($x, $y);

    public function getWidth();

    public function getHeight();

    public function render();
}
