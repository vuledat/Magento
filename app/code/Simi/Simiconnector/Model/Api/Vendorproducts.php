<?php

/**
 * Copyright © 2016 Simi. All rights reserved.
 */

namespace Simi\Simiconnector\Model\Api;

class Vendorproducts extends Apiabstract
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
            ->get('Magestore\Multivendor\Model\VendorProduct')
            ->getCollection();
        $this->builderQuery = $vendorCollection;
        return $vendorCollection;
    }

    public function index()
    {
        $result = parent::index();
        foreach ($result['vendorproducts'] as $index => $item) {

            $result['vendorproducts'][$index] = $item;

        }
        return $result;
    }


}
