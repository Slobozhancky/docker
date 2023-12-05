<?php

namespace Root\Html\TV\BrandsTVCreators;

use Root\Html\TV\TV\LCD;
use Root\Html\TV\TV\LED;
use Root\Html\TV\TV\TVCreator;

class SonyFactory extends TVFactory
{

    public function createLEDTV(): TVCreator
    {
        return new LED();
    }

    public function createLCDTV(): TVCreator
    {
        return new LCD();
    }
}