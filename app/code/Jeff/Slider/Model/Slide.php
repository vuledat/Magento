<?php
namespace Jeff\Slider\Model;
class Slide extends \Magento\Framework\Model\AbstractModel implements \Jeff\Slider\Api\Data\SlideInterface, \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'jeff_slider_slide';

    protected function _construct()
    {
        $this->_init('Jeff\Slider\Model\ResourceModel\Slide');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * @api
     * @return int|null
     */
    public function getId() {
        return $this->getData(self::PROPERTY_ID);
    }

    /**
     * @api
     * @param int $id
     * @return \Jeff\Slider\Model\Slide 
     */
    public function setId($id) {
        $this->setData(self::PROPERTY_ID, $id);
        return $this;
    }

    /**
     * @api
     * @return int|null
     */
    public function getSlideId() {
        return $this->getData(self::PROPERTY_SLIDE_ID);
    }

    /**
     * @api
     * @param int $slideId
     * @return \Jeff\Slider\Model\Slide 
     */
    public function setSlideId($slideId) {
        $this->setData(self::PROPERTY_SLIDE_ID, $slideId);
        return $this;
    }

    /**
     * @api
     * @return string|null
     */
    public function getTitle() {
        return $this->getData(self::PROPERTY_TITLE);
    }

    /**
     * @api
     * @param string $title
     * @return \Jeff\Slider\Model\Slide 
     */
    public function setTitle($title) {
        $this->setData(self::PROPERTY_TITLE, $title);
    }
}
