<?php

require_once __DIR__ . '/vendor/autoload.php';

use Root\Html\TV\BrandsTVCreators\SonyFactory;
use Root\Html\TV\BrandsTVCreators\LGFactory;

$sony = new SonyFactory();

$sony_led = $sony->createLEDTV();

d($sony_led->turnOn());

$lg = new LGFactory();

$lg_lcd = $lg->createLCDTV();

d($lg_lcd->turnOFF());











