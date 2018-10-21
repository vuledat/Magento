<?php
namespace Dat\Crud\Model;
class Post extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'crud';

    protected $_cacheTag = 'crud';

    protected $_eventPrefix = 'crud';

    protected function _construct()
    {
        $this->_init('Dat\Crud\Model\ResourceModel\Post');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }
}