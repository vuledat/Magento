<?php
namespace Jeff\Slider\Model\ResourceModel;
class Slide extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('jeff_slider_slide','jeff_slider_slide_id');
    }
}
