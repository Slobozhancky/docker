<?php
require_once __DIR__ . '/vendor/autoload.php';

// За принципом Single Responsibility проведіть рефакторинг класу так щоб у вас був клас для роботи з продуктом, для обробки продукту та для виведення продукту.

class ProductData
{
    public function get($name)
    {
    }

    public function set($name, $value)
    {
    }
}

class ProductDataManager
{
    public function save()
    {
    }

    public function update()
    {
    }

    public function delete()
    {
    }
}

class GetProductInfo
{
    public function show()
    {
    }

    public function print()
    {
    }
}

class ProductHandler
{
    private $productData;
    private $getProductInfo;

    private $productDataManager;

    public function __construct(ProductData $productData, GetProductInfo $getProductInfo, ProductDataManager $productDataManager)
    {
        $this->productData = $productData;
        $this->getProductInfo = $getProductInfo;
        $this->productDataManager = $productDataManager;
    }
}

$prod = new ProductData();

$prodInfo = new GetProductInfo();

$prodManger = new ProductDataManager();

$prodHand = new ProductHandler($prod, $prodInfo, $prodManger);

d($prodHand);