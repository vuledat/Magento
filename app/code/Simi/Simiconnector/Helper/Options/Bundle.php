<?php

/**
 * Connector data helper
 */

namespace Simi\Simiconnector\Helper\Options;

class Bundle extends \Simi\Simiconnector\Helper\Options
{

    public function getOptions($product)
    {
        $layout                    = $this->simiObjectManager->get('Magento\Framework\View\LayoutInterface');
        $block                     = $layout->createBlock('Magento\Bundle\Block\Catalog\Product\View\Type\Bundle');
        $block->setProduct($product);
        $options                   = [];
        $configurable_options      = json_decode($block->getJsonConfig());
        $options['bundle_options'] = $configurable_options;
        return $options;
    }
}
