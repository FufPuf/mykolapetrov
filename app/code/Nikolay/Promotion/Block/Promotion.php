<?php

namespace Nikolay\Promotion\Block;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\Template;

class Promotion extends Template
{
    const CONFIG_CATEGORY_PATH = "nikolay_promotion_section/promo_mein_settings/promo_enabled";
    protected $_scopeConfig;

    public function __construct(
        Template\Context $context,
        ScopeConfigInterface $scopeConfig,
        array $data = [])
    {
        parent::__construct($context, $data);
        $this->_scopeConfig = $scopeConfig;
    }

    public function getConfValue()
    {
        return $this->_scopeConfig->getValue(self::CONFIG_CATEGORY_PATH);
    }
}