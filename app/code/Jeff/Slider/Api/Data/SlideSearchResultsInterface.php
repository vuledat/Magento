<?php
namespace Jeff\Slider\Api\Data;

interface SlideSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface {
    /*
     * Get slide list
     *
     * @return \Jeff\Slider\Api\Data\SlideInterface[]
     */
    public function getItems();

    /*
     * set slide list
     *
     * @param \Jeff\Slider\Api\Data\SlideInterface[]
     * @return $this
     */
    public function setItems(array $items);

}
