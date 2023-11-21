<?php

class ValueObject {
    private int $red;
    private int $green;
    private int $blue;
    public function getRed(): int
    {
        return $this->red;
    }
    public function setRed(int $red): void
    {
        try {
            if (($red < 0 || $red > 255)){
                throw new Exception("Red is not a valid colour");
            }
            $this->red = $red;
        }catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function getGreen(): int
    {
        return $this->green;
    }
    public function setGreen(int $green): void
    {
        try {
            if (($green < 0 || $green > 255)){
                throw new Exception("Green is not a valid colour");
            }
            $this->green = $green;
        }catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function getBlue(): int
    {
        return $this->blue;
    }
    public function setBlue(int $blue): void
    {
        try {
            if (($blue < 0 || $blue > 255)){
                throw new Exception("Blue is not a valid colour");
            }
            $this->blue = $blue;
        }catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function equals(ValueObject $secondObject): bool {

        if ($this->getRed() === $secondObject->getRed()
            && $this->getGreen() === $secondObject->getGreen()
            && $this->getBlue() === $secondObject->getBlue()){
            return 1;
        }else{
            return 0;
        }
    }
    public static function random(): self {
        $red = mt_rand(0, 255);
        $green = mt_rand(0, 255);
        $blue = mt_rand(0, 255);

        $randomColor = new self();

        $randomColor->setRed($red);
        $randomColor->setGreen($green);
        $randomColor->setBlue($blue);

        return $randomColor;
    }
    public function mix($red, $green, $blue): Object
    {
        $avgRed = avg($red, $this->getRed());
        $avgGreen = avg($green, $this->getGreen());
        $avgBlue = avg($blue, $this->getBlue());

        $mix = new ValueObject();

        $mix->setRed($avgRed);
        $mix->setGreen($avgGreen);
        $mix->setBlue($avgBlue);

        return $mix;
    }
}

function avg(int $num1, int $num2): int {
    return ($num1 + $num2) / 2;
}

$color_1 = new ValueObject();

$color_1->setRed(250);
$color_1->setGreen(250);
$color_1->setBlue(250);

$color_2 = new ValueObject();

$color_2->setRed(12);
$color_2->setGreen(28);
$color_2->setBlue(55);

echo $color_1->equals($color_2);

$color_3 = ValueObject::random();

var_dump($color_1->mix(100,300,100));

