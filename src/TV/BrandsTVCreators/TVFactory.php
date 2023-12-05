<?php

namespace Root\Html\TV\BrandsTVCreators;

use Root\Html\TV\TV\TVCreator;

abstract class TVFactory
{
    abstract public function createLEDTV(): TVCreator;

    abstract public function createLCDTV(): TVCreator;
}