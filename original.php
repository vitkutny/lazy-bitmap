<?php

function bNot($b) {
    return 1 - $b;
}

function bAnd($b1, $b2) {
    if ($b1 == 1 && $b1 == $b2) {
        return 1;
    } else {
        return 0;
    }
}

function bOr($b1, $b2) {
    if ($b1 == 0 && $b1 == $b2) {
        return 0;
    } else {
        return 1;
    }
}

function blackLbm() {
    return function ($x, $y) {
        return 0;
    };
}

function whiteLbm() {
    return function ($x, $y) {
        return 1;
    };
}

function squareLbm($relativeSize) {
    $borderRelativeSize = (1 - $relativeSize) / 2;
    return function ($x, $y) use ($borderRelativeSize) {
        if (LBM_WIDTH * $borderRelativeSize <= $x &&
                $x < LBM_WIDTH * (1 - $borderRelativeSize) &&
                LBM_HEIGHT * $borderRelativeSize <= $y &&
                $y < LBM_HEIGHT * (1 - $borderRelativeSize)
        ) {
            return 1;
        } else {
            return 0;
        }
    };
}

function lbmArrayToBitmap(array $array) {
    return function ($x, $y) use ($array) {
        return $array[$x][$y];
    };
}

function lbmImageToBitmap($image) {
    return function ($x, $y) use ($image) {
        $index = imagecolorat($image, $x, $y);
        $colors = imagecolorsforindex($image, $index);
        if ($colors['red'] + $colors['green'] + $colors['blue'] / 3 > 127) {
            return 1;
        } else {
            return 0;
        }
    };
}

function lbmNot($lbm) {
    return function ($x, $y) use ($lbm) {
        return bNot($lbm($x, $y));
    };
}

function lbmAnd2($lbm1, $lbm2) {
    return function($x, $y) use ($lbm1, $lbm2) {
        return band($lbm1($x, $y), $lbm2($x, $y));
    };
}

function lbmAnd($lbm) {
    for ($i = 1; $i < func_num_args(); $i++) {
        $lbm = lbmAnd2($lbm, func_get_arg($i));
    }
    return $lbm;
}

function lbmOr2($lbm1, $lbm2) {
    return function ($x, $y) use ($lbm1, $lbm2) {
        return bor($lbm1($x, $y), $lbm2($x, $y));
    };
}

function lbmOr($lbm) {
    for ($i = 1; $i < func_num_args(); $i++) {
        $lbm = lbmOr2($lbm, func_get_arg($i));
    }
    return $lbm;
}

function lbmDiff($lbm1, $lbm2) {
    return lbmAnd2($lbm1, lbmNot($lbm2));
}

function lbmShift($lbm, $dx, $dy) {
    return function ($x, $y) use ($lbm, $dx, $dy) {
        $oldX = $x - $dx;
        $oldY = $y - $dy;
        if (-1 < $oldX && $oldX < LBM_WIDTH && -1 < $oldY && $oldY < LBM_HEIGHT) {
            return $lbm($oldX, $oldY);
        } else {
            return 1;
        }
    };
}

function lbmTopEdge($lbm) {
    return lbmDiff($lbm, lbmShift($lbm, 0, 5));
}

function lbmEdges($lbm) {
    return lbmOr(lbmDiff($lbm, lbmShift($lbm, 0, 5)), lbmDiff($lbm, lbmShift($lbm, 0, -5)), lbmDiff($lbm, lbmShift($lbm, 5, 0)), lbmDiff($lbm, lbmShift($lbm, -5, 0)));
}

function lbmBitmapBits($lbm) {
    $array = array();
    for ($y = 0; $y < LBM_HEIGHT; $y++) {
        for ($x = 0; $x < LBM_WIDTH; $x++) {
            $array[$x][$y] = $lbm($x, $y);
        }
    }
    return $array;
}

function lbmDisplayBitmap($lbm) {
    $bm = lbmBitmapBits($lbm);
    $image = imagecreatetruecolor(LBM_WIDTH, LBM_HEIGHT);
    for ($y = 0; $y < LBM_HEIGHT; $y++) {
        for ($x = 0; $x < LBM_WIDTH; $x++) {
            if ($bm[$x][$y]) {
                $color = imagecolorallocate($image, 255, 255, 255);
            } else {
                $color = imagecolorallocate($image, 0, 0, 0);
            }
            imagesetpixel($image, $x, $y, $color);
        }
    }
    header('Content-Type: image/png');
    imagepng($image);
}

$src = "image.jpg";
$image = imagecreatefromstring(file_get_contents($src));
define('LBM_HEIGHT', imagesy($image));
define('LBM_WIDTH', imagesx($image));
lbmDisplayBitmap(lbmTopEdge(lbmImageToBitmap($image)));
//lbmDisplayBitmap(squareLbm(2 / 3));

