<?php
/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Nikolay\Brand\Model\Attribute\Source;

use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;

class Brand extends AbstractSource
{
    /**
     * Get all options
     * @return array
     */

    public function getAllOptions()
    {
        if (!$this->_options) {
            $this->_options = [
                ['label' => __('Adidas'), 'value' => 'adidas'],
                ['label' => __('Nike'), 'value' => 'nike'],
                ['label' => __('Columbia'), 'value' => 'columbia'],
            ];
        }
        return $this->_options;
    }
}