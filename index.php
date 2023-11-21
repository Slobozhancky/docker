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
        if(!($red < 0 || $red > 255)){
            $this->red = $red;
        }else{
            echo "this is not a valid colour";
        }
    }

    public function getGreen(): int
    {
        return $this->green;
    }

    public function setGreen(int $green): void
    {
        if(!($green < 0 || $green > 255)){
            $this->green = $green;
        }else{
            echo "this is not a valid colour";
        }
    }

    public function getBlue(): int
    {
        return $this->blue;
    }

    public function setBlue(int $blue): void
    {
        if($blue < 0 || $blue > 255){
            echo "this is not a valid colour";
        }else{
            $this->blue = $blue;
        }
    }
}

$color_1 = new ValueObject();

$color_1->setRed(12);
$color_1->setGreen(0);
$color_1->setBlue(10);

echo $color_1->getRed();
echo $color_1->getGreen();
echo $color_1->getBlue();

