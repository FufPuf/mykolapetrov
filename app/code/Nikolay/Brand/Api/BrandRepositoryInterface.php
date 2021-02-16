<?php

namespace Nikolay\Brand\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Nikolay\Brand\Api\Data\BrandInterface;

interface BrandRepositoryInterface
{
    /**
     * @param $id
     * @return \Nikolay\Brand\Api\Data\BrandInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($id);

    /**
     * @param \Nikolay\Brand\Api\Data\BrandInterface $brand
     * @return \Nikolay\Brand\Api\Data\BrandInterface
     */
    public function save(BrandInterface $brand);

    /**
     * @param \Nikolay\Brand\Api\Data\BrandInterface $brand
     * @return void
     */
    public function delete(BrandInterface $brand);

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return \Nikolay\Brand\Api\Data\BrandSearchResultInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria);
}