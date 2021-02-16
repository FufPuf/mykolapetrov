<?php

namespace Nikolay\Brand\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface BrandSearchResultInterface extends SearchResultsInterface
{
    /**
     * @return \Nikolay\Brand\Api\Data\BrandInterface[]
     */
    public function getItems();

    /**
     * @param \Nikolay\Brand\Api\Data\BrandInterface[] $items
     * @return void
     */
    public function setItems(array $items);
}