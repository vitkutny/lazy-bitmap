<?php

namespace LazyBitmap;

class Pixel {

    public $red;
    public $green;
    public $blue;
    public $alpha;
    private $active = true;

    public function __construct($red = 0, $green = 0, $blue = 0, $alpha = 0) {
        $this->setColor($red, $green, $blue);
        $this->setAlpha($alpha);
    }

    public function setColor($red = 0, $green = 0, $blue = 0) {
        $this->red = $red;
        $this->green = $green;
        $this->blue = $blue;
    }

    public function getColor($image = NULL) {
        if ($image) {
            return imagecolorallocatealpha($image, $this->red, $this->green, $this->blue, $this->alpha);
        } else {
            return array(
                'red' => $this->red,
                'green' => $this->green,
                'blue' => $this->blue,
            );
        }
    }

    public function setAlpha($alpha = 0) {
        $this->alpha = 127 * $alpha / 100;
    }

    public function fromArray(array $colors) {
        $this->setColor($colors['red'], $colors['green'], $colors['blue']);
        $this->setAlpha($colors['alpha']);
    }

    public function toArray() {
        return array(
            'red' => $this->red,
            'green' => $this->green,
            'blue' => $this->blue,
            'alpha' => $this->alpha
        );
    }

    public function fromHsl($h, $s, $l) {
        if ($s == 0) {
            $this->red = $this->green = $this->blue = 255 * $l;
        } else {
            $q = $l < 0.5 ? $l * (1 + $s) : $l + $s - $l * $s;
            $p = 2 * $l - $q;
            $this->red = 255 * $this->hueToRgb($p, $q, $h + 1 / 3);
            $this->green = 255 * $this->hueToRgb($p, $q, $h);
            $this->blue = 255 * $this->hueToRgb($p, $q, $h - 1 / 3);
        }
    }

    private function hueToRgb($p, $q, $t) {
        if ($t < 0) {
            $t += 1;
        } elseif ($t > 1) {
            $t -= 1;
        }
        if ($t < 1 / 6) {
            return $p + ($q - $p) * 6 * $t;
        } elseif ($t < 1 / 2) {
            return $q;
        } elseif ($t < 2 / 3) {
            return $p + ($q - $p) * (2 / 3 - $t) * 6;
        }
        return $p;
    }

    public function toHsl() {
        $r = $this->red / 255;
        $g = $this->green / 255;
        $b = $this->blue / 255;
        $max = max($r, $g, $b);
        $min = min($r, $g, $b);
        $l = ($max + $min) / 2;

        if ($max == $min) {
            $h = $s = 0;
        } else {
            $d = $max - $min;
            $s = $l > 0.5 ? $d / (2 - $max - $min) : $d / ($max + $min);
            switch ($max) {
                case $r: $h = ($g - $b) / $d + ($g < $b ? 6 : 0);
                    break;
                case $g: $h = ($b - $r) / $d + 2;
                    break;
                case $b: $h = ($r - $g) / $d + 4;
                    break;
            }
            $h /= 6;
        }
        return array(
            'h' => $h,
            's' => $s,
            'l' => $l
        );
    }

    public function getAverage() {
        return ($this->red + $this->green + $this->blue) / 3;
    }

    public function disable() {
        $this->active = false;
    }

    public function activate() {
        $this->active = true;
    }

    public function isActive() {
        return $this->active;
    }

}
