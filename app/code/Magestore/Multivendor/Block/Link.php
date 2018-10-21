<?php
namespace Magestore\Multivendor\Block;
class Link extends \Magento\Framework\View\Element\Html\Link
{
    protected $_configHelper;
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magestore\Multivendor\Helper\Config $configHelper,
        array $data = []
    ) {
        $this->_configHelper = $configHelper;
        parent::__construct($context, $data);
    }
    /**
     * @return string
     */
    public function getHref()
    {
        return $this->_storeManager->getStore()->getUrl('multivendor/vendor/listing');
    }
    public function  toHtml()
    {        if($this->_configHelper->getStoreConfig('multivendor/general/enable_toplink') == 0){
        return '';
    }
    else{
        return parent::toHtml();
    }
    }
}
