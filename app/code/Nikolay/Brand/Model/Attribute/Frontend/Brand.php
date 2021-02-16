<?php

namespace Nikolay\Brand\Model\Attribute\Frontend;

use Magento\Eav\Model\Entity\Attribute\Frontend\AbstractFrontend;
use Magento\Framework\DataObject;

class Brand extends AbstractFrontend
{
    public function getValue(DataObject $object)
    {
        $value = $object->getData($this->getAttribute()->getFrontend()->getLabel());

        print_r($object->getData('product')->getBrand());
        return "<b>$value</b>";
    }
}