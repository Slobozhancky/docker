<?php

namespace Root\Html\TV\TV;

class LED implements TVCreator
{

    public function turnOn(): string
    {
        return 'LED TV On';
    }

    public function turnOFF(): string
    {
        return 'LED TV Off';
    }
}