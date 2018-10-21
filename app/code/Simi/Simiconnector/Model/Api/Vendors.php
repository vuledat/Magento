<?php

/**
 * Copyright © 2016 Simi. All rights reserved.
 */

namespace Simi\Simiconnector\Model\Api;

class Vendors extends Apiabstract
{

    public $DEFAULT_ORDER = 'vendor_id';

    public function setBuilderQuery()
    {
//        $data = $this->getData();
        $this->builderQuery = $this->getCollection();

    }

    public function getCollection()
    {
        $vendorCollection = $this->simiObjectManager
            ->get('Magestore\Multivendor\Model\Vendor')
            ->getCollection();
        $this->builderQuery = $vendorCollection;
        return $vendorCollection;
    }

    public function index()
    {
        $result = parent::index();

        $vendorproductCollection = $this->simiObjectManager
            ->get('Magestore\Multivendor\Model\VendorProduct')
            ->getCollection();
        $this->builderQuery = $vendorproductCollection;


        foreach ($result['vendors'] as $index => $item) {

//                foreach ( $result['vendorproducts'] as $indexp => $itemp){
//                    $item['product_id'] = $item['vendor_id'];
//                }

//                $item['product_id'] = $item['vendor_id'];
                $result['vendors'][$index] = $item;

        }
        return $result;
    }

}
