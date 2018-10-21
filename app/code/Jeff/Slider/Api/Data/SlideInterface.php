<?php
namespace Jeff\Slider\Api\Data;

interface SlideInterface 
{
    const PROPERTY_ID  = 'jeff_slider_slide_id';
    const PROPERTY_SLIDE_ID = 'jeff_slider_slide_id';
    const PROPERTY_TITLE = 'title';

    /**
     * @api 
     * @return int|null
     */
    public function getId();

    /**
     * @api 
     *
     * @param int $slideId
     * @return \Jeff\Slider\Model\Slide 
     */
    public function setId($slideId);

    /**
     * get Slide Entity 'slide_id' property value
     * @return int|null
     */
    public function getSlideId();

    /**
     * set Slide entity 'slide_id' property value
     * @param int $slideId
     * @return \Jeff\Slider\Model\Slide 
     */
    public function setSlideId($slideId);
    
    /**
     * get Slide entity 'title' property value
     * @return string|null
     */
    public function getTitle();

    /**
     * set Slide entity 'title' property value
     * @param string $title
     * @return \Jeff\Slider\Model\Slide 
     */
    public function setTitle($title);
}
