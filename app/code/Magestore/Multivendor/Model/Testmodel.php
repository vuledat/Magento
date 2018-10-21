<?php

namespace Magestore\Multivendor\Model;

class Testmodel extends \Magento\Framework\Model\AbstractModel implements
    \Magestore\Multivendor\Api\Data\TestdataInterface
{
    const KEY_NAME = 'name';
    const KEY_AGE = 'age';


    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Model\ResourceModel\AbstractResource $resource = null,
        \Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null,
        array $data = []
    ) {
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }


    public function getName()
    {
        return $this->_getData(self::KEY_NAME);
    }
    public function getAge()
    {
        return $this->_getData(self::KEY_AGE);
    }

    /**
     * Set name
     *
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        return $this->setData(self::KEY_NAME, $name);
    }
    public function setAge($name)
    {
        return $this->setData(self::KEY_AGE, $name);
    }


}