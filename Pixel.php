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
