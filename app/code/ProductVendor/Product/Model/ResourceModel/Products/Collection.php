<?php
namespace ProductVendor\Product\Model\ResourceModel\Products;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'crud_id';
    protected $_eventPrefix = 'product_collection';
    protected $_eventObject = 'products_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('ProductVendor\Product\Model\Products', 'ProductVendor\Product\Model\ResourceModel\Products');
    }

}
