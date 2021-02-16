<?php

namespace Nikolay\Brand\Model\ResourceModel\Brand;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init('Nikolay\Brand\Model\Brand', 'Nikolay\Brand\Model\ResourceModel\Brand');
    }
}