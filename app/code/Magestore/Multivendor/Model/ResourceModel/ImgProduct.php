<?php
namespace Magestore\Multivendor\Model\ResourceModel;
/**
 * Class Vendor
 * @package Magestore\Multivendor\Model\ResourceModel
 */
class ImgProduct extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb {
    protected function _construct()	{
        $this->_init('catalog_product_entity_media_gallery', 'value_id');
    }
}