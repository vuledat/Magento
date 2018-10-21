<?php
namespace Jeff\Slider\Model\ResourceModel\Slide;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init('Jeff\Slider\Model\Slide','Jeff\Slider\Model\ResourceModel\Slide');
    }
}
