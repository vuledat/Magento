<?php
namespace Dat\Crud\Controller\Index;
use Dat\Crud\Model\PostFactory;
class Cody extends \Magento\Framework\App\Action\Action
{

    protected $_PostFactory;
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Dat\Crud\Model\PostFactory $modelPost
    ) {
        parent::__construct($context);
        $this->_PostFactory = $modelPost;
    }

    public function execute()
    {
        /**
         * When Magento get your model, it will generate a Factory class
         * for your model at var/generaton folder and we can get your
         * model by this way
         */
        die('123123');
        $newsModel = $this->_PostFactory->create();

        // Load the item with ID is 1
        $item = $newsModel->load(1);
        var_dump($item->getData());




    }
}