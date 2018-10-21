<?php
namespace Jeff\Slider\Api;

//use Jeff\Slider\Model\SlideInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

/**
 * @api
 */
interface SlideRepositoryInterface
{
    /**
     * Save Slide.
     * @param \Jeff\Slider\Api\Data\SlideInterface $slide
     * @return \Jeff\Slider\Api\Data\SlideInterface
     *
     */
    public function save(\Jeff\Slider\Api\Data\SlideInterface  $slide);

    /**
     *  Slide.
     * @param int $slideId
     * @return \Jeff\Slider\Api\Data\SlideInterface
     *
     */
    public function getById($slideId);

    /**
     * Retrive slides matching the specified criteria
     * @param \Magento\Framework\Api\SearchCriteriaInterface $criteria
     * @return \Magento\Framework\Api\SearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $criteria);

    /**
     * @param Jeff\Slider\Api\Data\SlideInterface $page
     * @return bool true on success
     */
    public function delete(\Jeff\Slider\Api\Data\SlideInterface $page);

    /**
     * @param int $slideId
     * @return bool true on success
     */
    public function deleteById($slideId);
}
