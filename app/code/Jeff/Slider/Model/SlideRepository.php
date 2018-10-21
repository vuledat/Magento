<?php
namespace Jeff\Slider\Model;

//use Jeff\Slider\Api\SlideRepositoryInterface;
//use Jeff\Slider\Model\SlideInterface;
//use Jeff\Slider\Model\SlideFactory;
//use Jeff\Slider\Model\ResourceModel\Slide\CollectionFactory;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Api\SearchResultsInterfaceFactory;

/**
 * @api
 */
class SlideRepository implements \Jeff\Slider\Api\SlideRepositoryInterface
{
    /**
     * @var \Jeff\Slider\Model\ResourceModel\Slide
     */
    protected $resource;

    /**
     * @var \Jeff\Slider\Model\SlideFactory
     */
    protected $slideFactory;

    /**
     * @var \Jeff\Slider\Model\ResourceModel\Slide\CollectionFactory
     */
    protected $slideCollectionFactory;

    /**
     * @var \Magento\Framework\Api\SearchResultsInterface
     */
    protected $searchResultsFactory;

    /**
     * @var \Magento\Framework\Api\DataObjectHelper
     */
    protected $dataObjectHelper;

    /**
     * @var \Magento\Framework\Reflection\DataObjectProcessor
     */
    protected $dataObjectProcessor;

    /**
     * @var \Jeff\Slider\Api\Data\SlideInterfaceFactory
     */
    protected $dataSlideFactory;

    /**
     * @param ResourceModel\Slide $resource;
     * @param SlideFactory $slideFactory
     * @param ResourceModel\Slide\CollectionFactory $slideCollectionFactory
     * @param \Jeff\Slider\Api\Data\SlideSearchResultsInterface $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param \Jeff\Slider\Api\Data\SlideInterfaceFactory $dataSlideFactory
     */
    public function __construct(
        \Jeff\Slider\Model\ResourceModel\Slide $resource,
        \Jeff\Slider\Model\SlideFactory  $slideFactory,
        \Jeff\Slider\Model\ResourceModel\Slide\CollectionFactory $slideCollectionFactory,
        \Magento\Framework\Api\SearchResultsInterface $searchResultsFactory,
        //\Jeff\Slider\Api\Data\SlideSearchResultsInterface $searchResultsFactory,
        \Magento\Framework\Api\DataObjectHelper $dataObjectHelper,
        \Magento\Framework\Reflection\DataObjectProcessor $dataObjectProcessor,
        \Jeff\Slider\Api\Data\SlideInterfaceFactory $dataSlideFactory
    )
    {
        $this->resource = $resource;
        $this->slideFactory        = $slideFactory;
        $this->slideCollectionFactory    = $slideCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->dataSlideFactory = $dataSlideFactory;
    }
    
    /**
     * @api
     * @param \Jeff\Slider\Api\Data\SlideInterface $slide
     * @return \Jeff\Slider\Api\Data\SlideInterface 
     */
    public function save(\Jeff\Slider\Api\Data\SlideInterface $slide)
    {
        try
        {
            $this->resource->save($slide);
        }
        catch(\Exception $e)
        {
            throw new CouldNotSaveException(__($e->getMessage()));
        }
        return $slide;
    }

    /**
     * @api
     * @param int $slideId
     * @return \Jeff\Slider\Api\Data\SlideInterface
     */
    public function getById($slideId)
    {
        $slide = $this->slideFactory->create();

        $this->resource->load($slide, $slideId);

        if (!$slide->getId()) {
            throw new NoSuchEntityException(__('Object with id "%1" does not exist.', $slideId));
        }
        return $slide;        
    }       

    /**
     * @api
     * @param \Jeff\Slider\Api\Data\SlideInterface $slide
     * @return bool ture if success 
     */
    public function delete(\Jeff\Slider\Api\Data\SlideInterface $slide)
    {
        try {
            $this->resource->delete($slide);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__($exception->getMessage()));
        }
        return true;    
    }    

    /**
     * @api
     * @param int $id
     * return bool true on success
     */
    public function deleteById($id)
    {
        return $this->delete($this->getById($id));
    }    

    /**
     * @api
     * @param \Magento\Framework\Api\SearchCriteriaInterface $criteria
     * @return \Magento\Framework\Api\SearchResultsInterface
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria)
    {
        //echo get_class($this->searchResultsFactory). "\n\n";
        $searchResults = $this->searchResultsFactory; //->create();
        $searchResults->setSearchCriteria($searchCriteria);  
        $collection = $this->slideCollectionFactory->create();

        foreach ($searchCriteria->getFilterGroups() as $filterGroup) {
            $fields = [];
            $conditions = [];
            foreach ($filterGroup->getFilters() as $filter) {
                $condition = $filter->getConditionType() ? $filter->getConditionType() : 'eq';
                $fields[] = $filter->getField();
                $conditions[] = [$condition => $filter->getValue()];
            }
            if ($fields) {
                $collection->addFieldToFilter($fields, $conditions);
            }
        }  

        $searchResults->setTotalCount($collection->getSize());
        $sortOrders = $searchCriteria->getSortOrders();
        if ($sortOrders) {
            /** @var SortOrder $sortOrder */
            foreach ($sortOrders as $sortOrder) {
                $collection->addOrder(
                    $sortOrder->getField(),
                    ($sortOrder->getDirection() == SortOrder::SORT_ASC) ? 'ASC' : 'DESC'
                );
            }
        }
        $collection->setCurPage($searchCriteria->getCurrentPage());
        $collection->setPageSize($searchCriteria->getPageSize());
        $slides = [];

        /** @var \Foggyline\Slider\Model\Slide $slideModel */
        foreach($collection as $slideModel) {
            $slideData = $this->dataSlideFactory->create();
            $this->dataObjectHelper->populateWithArray($slideData, $slideModel->getData(), '\Jeff\Slider\Api\Data\SlideInterface');
            $slides[] = $this->dataObjectProcessor->buildOutputDataArray($slideData, '\Jeff\Slider\Api\Data\SlideInterface');
        }

        $this->searchResultsFactory->setItems($slides);
        return $this->searchResultsFactory;
/*
        $objects = [];                                     
        foreach ($collection as $objectModel) {
            $objects[] = $objectModel;
        }
        $searchResults->setItems($objects);
        return $searchResults; 
*/
    }
}
