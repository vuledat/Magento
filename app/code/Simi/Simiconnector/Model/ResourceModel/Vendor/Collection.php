<?php

/**
 * Simiconnector Resource Collection
 */

namespace Simi\Simiconnector\Model\ResourceModel\Vendor;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * Resource initialization
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('Magestore\Multivendor\Model\Vendor', 'Magestore\Multivendor\Model\ResourceModel\Vendor');
    }

    public function applyAPICollectionFilter($visibilityTable, $typeID, $storeID)
    {
        $this->getSelect();
//                ->join(
//                    ['visibility' => $visibilityTable],
//                    'visibility.item_id = main_table.banner_id AND visibility.content_type = ' . $typeID
//                    . ' AND visibility.store_view_id =' . $storeID
//                );
        return $this;
    }
}
