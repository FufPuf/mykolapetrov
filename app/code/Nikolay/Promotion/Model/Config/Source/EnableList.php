<?php

namespace Nikolay\Promotion\Model\Config\Source;

use Magento\Framework\Data\OptionSourceInterface;

class EnableList implements OptionSourceInterface
{
    /**
     * @return array[]
     */
    public function toOptionArray()
    {
        return [
            ['value' => true, 'label' => __('Enable')],
            ['value' => false, 'label' => __('Disable')]
            ];
    }
}