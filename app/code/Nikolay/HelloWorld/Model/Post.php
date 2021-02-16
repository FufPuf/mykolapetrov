<?php

namespace Nikolay\HelloWorld\Model;

use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;

class Post extends AbstractModel implements IdentityInterface
{
    const CACHE_TAG = 'nikolay_helloworld_post';

    protected $_cacheTag = 'nikolay_helloworld_post';

    protected $_eventPrefix = 'nikolay_helloworld_post';

    protected function _construct()
    {
        $this->_init('Nikolay\HelloWorld\Model\ResourceModel\Post');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }
}