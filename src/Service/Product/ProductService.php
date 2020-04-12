<?php

declare(strict_types=1);

namespace Service\Product;

use Comparator\NameComparator;
use Comparator\PriceComparator;
use Model;
use Model\Entity\Product;
use Model\Repository\ProductRepository;

class ProductService
{

    /**
     * сортировщики
     * ProductSorter $priceSorter
     * ProductSorter $nameSorter
     */
    private $priceSorter;
    private $nameSorter;

    public function __construct()
    {
        $this->priceSorter = new ProductSorter(new PriceComparator());
        $this->nameSorter = new ProductSorter(new NameComparator());
    }

    /**
     * Получаем информацию по конкретному продукту
     * @param int $id
     * @return Product|null
     */
    public function getInfo(int $id): ?Product
    {
        $product = $this->getProductRepository()->search([$id]);
        return count($product) ? $product[0] : null;
    }

    /**
     * Получаем все продукты
     * @param string $sortType
     * @return Product[]
     */
    public function getAll(string $sortType): array
    {
        $productList = $this->getProductRepository()->fetchAll();

        // Применить паттерн Стратегия
        // $sortType === 'price'; // Сортировка по цене
        // $sortType === 'name'; // Сортировка по имени

        if ($sortType === 'price') {
            $productList = $this->priceSorter->sort($productList);
        } else if ($sortType === 'name') {
            $productList = $this->nameSorter->sort($productList);
        }

        return $productList;
    }

    /**
     * Фабричный метод для репозитория Product
     * @return ProductRepository
     */
    protected function getProductRepository(): ProductRepository
    {
        return new ProductRepository();
    }
}
