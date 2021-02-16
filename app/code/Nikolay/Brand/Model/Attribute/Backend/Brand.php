<?php
/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Nikolay\Brand\Model\Attribute\Backend;

use Magento\Catalog\Model\Product;
use Magento\Eav\Model\Entity\Attribute\Backend\AbstractBackend;
use Magento\Framework\Exception\LocalizedException;

class Brand extends AbstractBackend
{
    /**
     * Validate
     * @param Product $object
     * @throws LocalizedException
     * @return bool
     */
    public function validate($object)
    {
        if (($object->getAttributeSetId() == 10)) {
            throw new LocalizedException(
                __('Bottom can not be ...')
            );
        }
        return true;
    }
}
