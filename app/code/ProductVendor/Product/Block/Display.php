<?php
namespace ProductVendor\Product\Block;
class Display extends \Magento\Framework\View\Element\Template
{
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        ProductVendor\Product\Model\ProductFactory $productFactory
    )
    {
        $this->_productFactory = $productFactory;
        parent::__construct($context);
    }

    public function sayHello()
    {
        return __('Hello Mr. Dat');
    }
    public function getProductsCollection(){
        $post = $this->_productFactory->create();
        return $post->getCollection();
    }
}