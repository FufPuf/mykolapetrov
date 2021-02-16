<?php

namespace Nikolay\Brand\Model;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SortOrder;
use Magento\Framework\Exception\NoSuchEntityException;
use Nikolay\Brand\Api\BrandRepositoryInterface;
use Nikolay\Brand\Api\Data\BrandInterface;
use Nikolay\Brand\Model\ResourceModel\Brand\CollectionFactory as BrandCollectionFactory;
use Nikolay\Brand\Api\Data\BrandSearchResultInterfaceFactory;
use Nikolay\Brand\Model\ResourceModel\Brand\Collection;
use Nikolay\Brand\Model\ResourceModel\BrandFactory as BrandResourceFactory;

class BrandRepository implements BrandRepositoryInterface
{

    /**
     * @var \Nikolay\Brand\Model\BrandFactory
     */
    private $_brandFactory;

    /**
     * @var \Nikolay\Brand\Model\ResourceModel\Brand\CollectionFactory
     */
    private $_brandCollectionFactory;

    /**
     * @var \Nikolay\Brand\Api\Data\BrandSearchResultInterfaceFactory
     */
    private $_searchResultFactory;
    /**
     * @var \Nikolay\Brand\Model\ResourceModel\BrandFactory;
     */
    private $_brandResourceFactory;

    public function __construct(
        BrandFactory $brandFactory,
        BrandCollectionFactory $brandCollectionFactory,
        BrandSearchResultInterfaceFactory $brandSearchResultInterfaceFactory,
        BrandResourceFactory $brandResourceFactory
    ) {
        $this->_brandFactory = $brandFactory;
        $this->_brandCollectionFactory = $brandCollectionFactory;
        $this->_searchResultFactory = $brandSearchResultInterfaceFactory;
        $this->_brandResourceFactory = $brandResourceFactory;
    }

    public function getById($id)
    {
        $brand = $this->_brandFactory->create();
        $this->_brandResourceFactory->create()->load($brand, $id);;
        if (!$brand->getId()) {
            throw new NoSuchEntityException(__('Unable to find brand with ID "%1"', $id));
        }
        return $brand;
    }

    public function save(BrandInterface $brand)
    {
        $brand = $this->_brandFactory->create()->setData($brand);
        $this->_brandResourceFactory->create()->save($brand);
        return $brand;
    }

    public function delete(BrandInterface $brand)
    {
        $brand = $this->_brandFactory->create()->setData($brand);
        $this->_brandResourceFactory->create()->delete($brand);
    }

    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->_brandCollectionFactory->create();

        $this->addFiltersToCollection($searchCriteria, $collection);
        $this->addSortOrdersToCollection($searchCriteria, $collection);
        $this->addPagingToCollection($searchCriteria, $collection);

        $collection->load();

        return $this->buildSearchResult($searchCriteria, $collection);
    }

    private function addFiltersToCollection(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        foreach ($searchCriteria->getFilterGroups() as $filterGroup) {
            $fields = $conditions = [];
            foreach ($filterGroup->getFilters() as $filter) {
                $fields[] = $filter->getField();
                $conditions[] = [$filter->getConditionType() => $filter->getValue()];
            }
            $collection->addFieldToFilter($fields, $conditions);
        }
    }

    private function addSortOrdersToCollection(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        foreach ((array) $searchCriteria->getSortOrders() as $sortOrder) {
            $direction = $sortOrder->getDirection() == SortOrder::SORT_ASC ? 'asc' : 'desc';
            $collection->addOrder($sortOrder->getField(), $direction);
        }
    }

    private function addPagingToCollection(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        $collection->setPageSize($searchCriteria->getPageSize());
        $collection->setCurPage($searchCriteria->getCurrentPage());
    }

    private function buildSearchResult(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        $searchResults = $this->_searchResultFactory->create();

        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());

        return $searchResults;
    }
}