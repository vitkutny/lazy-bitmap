<?php

require_once __DIR__ . '/LazyBitmap/ImageBitmap.php';
require_once __DIR__ . '/LazyBitmap/SquareBitmap.php';
require_once __DIR__ . '/LazyBitmap/Effect/Edge/Edges.php';
require_once __DIR__ . '/LazyBitmap/Effect/Color/Negative.php';

use LazyBitmap\ImageBitmap;
use LazyBitmap\SquareBitmap;
use LazyBitmap\Effect\Edge\Edges;
use LazyBitmap\Effect\Color\Negative;

$image = new ImageBitmap(__DIR__ . '/image.jpg');
//$image = new SquareBitmap(2 / 3, 300, 300);
$edges = new Edges($image);
$negative = new Negative($edges);
$negative->render();
