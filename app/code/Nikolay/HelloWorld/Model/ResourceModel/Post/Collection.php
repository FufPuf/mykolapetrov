<?php

namespace Nikolay\HelloWorld\Model\ResourceModel\Post;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'post_id';
    protected $_eventPrefix = 'nikolay_helloworld_post';
    protected $_eventObject = 'post_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Nikolay\HelloWorld\Model\Post', 'Nikolay\HelloWorld\Model\ResourceModel\Post');
    }

}