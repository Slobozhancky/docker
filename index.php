<?php

require_once __DIR__ . '/vendor/autoload.php';

//AbstractFactory:
//Розробити структуру класів за допомогою патерну Абстрактна фабрика.
//
//ТЗ:
//
//Має бути 2 фабрики (Sony, LG) котрі створюють сімейство телевізорів:
//
//LED TV
//LCD TV
//Метода класів робимо максимально простими.
//
//Всі класи та інтерфейси мають бути в окремих файлах

interface LED_TV
{
    public function turnOn();

    public function turnOff();
}

class SonyLED_TV implements LED_TV
{

    public function turnOn(): string
    {
        return "Sony LED_TV On";
    }

    public function turnOff(): string
    {
        return "Sony LED_TV Off";
    }
}

class LG_LED_TV implements LED_TV
{
    public function turnOn(): string
    {
        return "LG LED_TV On";
    }

    public function turnOff(): string
    {
        return "LG LED_TV Off";
    }
}

interface LCD_TV
{
    public function turnOn();

    public function turnOff();
}

class SonyLCD_TV implements LCD_TV
{

    public function turnOn(): string
    {
        return "LG LCD_TV On";
    }

    public function turnOff(): string
    {
        return "Sony LCD_TV Off";
    }
}

class LG_LCD_TV implements LCD_TV
{

    public function turnOn(): string
    {
        return "LG LCD_TV On";
    }

    public function turnOff(): string
    {
        return "LG LCD_TV Off";
    }
}


