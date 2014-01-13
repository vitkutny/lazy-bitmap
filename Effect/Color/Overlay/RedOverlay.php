<?php

namespace LazyBitmap\Effect\Color\Overlay;

require_once __DIR__ . '/Overlay.php';
require_once __DIR__ . '/../../../ILazyBitmap.php';

use LazyBitmap\Effect\Color\Overlay\Overlay;
use LazyBitmap\ILazyBitmap;

class RedOverlay extends Overlay implements ILazyBitmap {

    public function getPixel($x, $y) {
        $pixel = parent::getPixel($x, $y);
        $pixel->setColor($pixel->red);
        return $pixel;
    }

}
