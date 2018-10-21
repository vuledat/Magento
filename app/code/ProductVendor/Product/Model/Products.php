<?php
namespace ProductVendor\Product\Model;
class Products extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'product';

    protected $_cacheTag = 'product';

    protected $_eventPrefix = 'product';

    protected function _construct()
    {
        $this->_init('ProductVendor\Product\Model\ResourceModel\Products');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }
}