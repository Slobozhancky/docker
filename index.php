<?php

require_once __DIR__ . '/vendor/autoload.php';

interface Taxi
{
    public function getTypeTaxi();

    public function getPriceTaxi();

}

class EconomyTaxi implements Taxi
{
    public function getTypeTaxi(): string
    {
        return "Economy taxi";
    }

    public function getPriceTaxi(): string
    {
        return 'Economy price';
    }
}

class StandartTaxi implements Taxi
{
    public function getTypeTaxi(): string
    {
        return "Standart taxi";
    }

    public function getPriceTaxi(): string
    {
        return 'Standart price';
    }
}

class LuxTaxi implements Taxi
{
    public function getTypeTaxi(): string
    {
        return "Lux taxi";
    }

    public function getPriceTaxi(): string
    {
        return 'Lux price';
    }
}

interface TaxiFactory
{
    public function createTaxi(): Taxi;
}

class EconomyTaxiFactory implements TaxiFactory
{
    public function createTaxi(): Taxi
    {
        return new EconomyTaxi();
    }
}

class StandartTaxiFactory implements TaxiFactory
{
    public function createTaxi(): Taxi
    {
        return new StandartTaxi();
    }
}

class LuxTaxiFactory implements TaxiFactory
{
    public function createTaxi(): Taxi
    {
        return new LuxTaxi();
    }
}

function orderTaxi(TaxiFactory $callTaxi): string
{
    $taxi = $callTaxi->createTaxi();
    return $taxi->getTypeTaxi() . ' ' . $taxi->getPriceTaxi();
}

d(orderTaxi(new EconomyTaxiFactory()));
d(orderTaxi(new StandartTaxiFactory()));
d(orderTaxi(new LuxTaxiFactory()));