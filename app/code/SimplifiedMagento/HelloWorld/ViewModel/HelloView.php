<?php

namespace SimplifiedMagento\HelloWorld\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;

class HelloView implements ArgumentInterface
{
    protected $productRepository;
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }



    public function getProductName()
    {
        $product = $this->productRepository->get('24-MB01');
        return $product->getName();
    }

    public function getHelloWorld()
    {
        return "This is a custom block";
    }

    public function helloArray()
    {
        $array = [
            "good",
            "very good",
            "excellent"
        ];

        return $array;
    }
}
