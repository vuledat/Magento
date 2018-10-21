<?php

namespace Magestore\Multivendor\Api;

use Magestore\Multivendor\Api\Data\TestdataInterface;

interface TestInterface
{
    /**
     * Retrieve list of info
     *
     * @throws \Magento\Framework\Exception\NoSuchEntityException If ID is not found
     * @return \Magestore\Multivendor\Api\Data\TestdataInterface containing Tree objects
     */
    public function getinfo();

}