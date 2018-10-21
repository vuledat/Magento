<?php
namespace Simi\Simiconnector\Model\ResourceModel;
/**
 * Class VendorProduct
 * @package Magestore\Multivendor\Model\ResourceModel
 */
class VendorProduct extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb {
    protected function _construct()	{
        $this->_init('multivendor_vendor_product', 'vendor_product_id');
    }
}