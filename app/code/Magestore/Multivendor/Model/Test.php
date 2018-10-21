<?php

namespace Magestore\Multivendor\Model;

use Magestore\Multivendor\Api\TestInterface;
use Magestore\Multivendor\Block\Vendor;
/**
 * Defines the implementaiton class of the calculator service contract.
 */
class Test implements TestInterface
{
    /**
     * Return the sum of the two numbers.
     *
     * @api
     * @param int $num1 Left hand operand.
     * @param int $num2 Right hand operand.
     * @return int The sum of the two values.
     */
    protected $dataFactory;
    protected $block;
    public function __construct(\Magestore\Multivendor\Api\Data\TestdataInterfaceFactory $dataFactory

)
    {
        $this->dataFactory = $dataFactory;
    }


    /**
     * @return \Magestore\Multivendor\Api\Data\TestdataInterface
     */
    public function getinfo() {


//        $collection = $block->getVendorCollection();
        $page_object = $this->dataFactory->create();
//        foreach ($collection as $vendorModel):
            $page_object->setName('Dat');
            $page_object->setAge('22');
//        endforeach;

        return $page_object;

    }

}