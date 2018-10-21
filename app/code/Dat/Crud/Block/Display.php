<?php
namespace Dat\Crud\Block;
class Display extends \Magento\Framework\View\Element\Template
{
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Dat\Crud\Model\PostFactory $postFactory
    )
    {
        $this->_postFactory = $postFactory;
        parent::__construct($context);
    }

    public function sayHello()
    {
        return __('Hello Mr. Dat');
    }
    public function getPostCollection(){
        $post = $this->_postFactory->create();
        return $post->getCollection();
    }
}