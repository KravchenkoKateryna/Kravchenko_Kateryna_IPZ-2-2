<?php

class Circle {
    private $x;
    private $y;
    private $radius;

    public function __construct($x, $y, $radius) {
        $this->x = $x;
        $this->y = $y;
        $this->radius = $radius;
    }

    public function __toString() {
        return "Коло з центром в ($this->x, $this->y) і радіусом $this->radius";
    }

    public function getX() {
        return $this->x;
    }

    public function setX($x) {
        $this->x = $x;
    }

    public function getY() {
        return $this->y;
    }

    public function setY($y) {
        $this->y = $y;
    }

    public function getRadius() {
        return $this->radius;
    }

    public function setRadius($radius) {
        $this->radius = $radius;
    }

    public function intersectsWith(Circle $otherCircle) {
        $distance = sqrt(($this->x - $otherCircle->getX()) ** 2 + ($this->y - $otherCircle->getY()) ** 2);
        $sumRadii = $this->radius + $otherCircle->getRadius();

        return $distance < $sumRadii;
    }
}

$circle1 = new Circle(3, 4, 5);
$circle2 = new Circle(8, 10, 6);

echo $circle1->__toString() . "\n";
echo $circle2->__toString() . "\n";

if ($circle1->intersectsWith($circle2)) {
    echo "Кола перетинаються.\n";
} else {
    echo "Кола не перетинаються.\n";
}
