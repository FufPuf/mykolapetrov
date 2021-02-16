<?php

namespace Nikolay\HelloWorld\Block;

use Magento\Framework\View\Element\Template;
use Nikolay\HelloWorld\Model\PostFactory;

class Test extends Template
{
    protected $_postFactory;

    public function __construct(
        Template\Context $context,
        PostFactory $postFactory
    ) {
        parent::__construct($context);
        $this->_postFactory = $postFactory;
    }

    public function getCollection()
    {
        $post = $this->_postFactory->create();
        return $post->getCollection();
    }

    public function getText()
    {
        return 'Hello World';
    }
}