<?php

namespace Root\Html\TV\TV;

class LCD implements TVCreator
{

    public function turnOn(): string
    {
        return 'LCD TV On';
    }

    public function turnOFF(): string
    {
        return 'LCD TV Off';
    }
}