<?php

namespace Nikolay\Brand\Model;

use Magento\Framework\Model\AbstractModel;
use Nikolay\Brand\Api\Data\BrandInterface;

class Brand extends AbstractModel implements BrandInterface
{
    const NAME = 'brand_name';
    const DESCRIPTION = 'brand_desc';
    const IMAGE_URLS = 'brand_img';

    protected function _construct()
    {
        $this->_init('Nikolay\Brand\Model\ResourceModel\Brand');
    }

    public function getName()
    {
        return $this->_getData(self::NAME);
    }

    public function setName($name)
    {
        $this->setData(self::NAME, $name);
    }

    public function getImageUrls()
    {
        return $this->_getData(self::IMAGE_URLS);
    }

    public function setImageUrls(array $urls)
    {
        $this->setData(self::IMAGE_URLS, $urls);
    }

    public function getDescription()
    {
        return $this->_getData(self::DESCRIPTION);
    }

    public function setDescription($description)
    {
        $this->setData(self::DESCRIPTION, $description);
    }
}