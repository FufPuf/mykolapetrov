<?php

namespace Nikolay\Brand\Block;

use Magento\Framework\App\RequestInterface;
use Magento\Framework\View\Element\Template;
use Nikolay\Brand\Api\BrandRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;

class Brand extends Template
{
    /**
     * @var RequestInterface
     */

    protected $_request;
    /**
     * @var BrandRepositoryInterface
     */
    protected $_brandRepository;
    /**
     * @var SearchCriteriaBuilder
     */
    protected $_searchCriteriaBuilder;

    /**
     * Brand constructor.
     *
     * @param Template\Context $context
     * @param RequestInterface $request
     * @param BrandRepositoryInterface $brandRepository
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param array $data
     */
    public function __construct(Template\Context $context,
                                RequestInterface $request,
                                BrandRepositoryInterface $brandRepository,
                                SearchCriteriaBuilder $searchCriteriaBuilder,
                                array $data = []
    ) {
        parent::__construct($context, $data);
        $this->_request = $request;
        $this->_brandRepository = $brandRepository;
        $this->_searchCriteriaBuilder = $searchCriteriaBuilder;
    }


    /**
     * @return string
     */
    public function getParam()
    {
        return $this->_request->getParam('id', null);
    }

    public function getBrandPage()
    {
        $id = $this->getParam();
        if(is_null($id)) {
            $searchCriteria = $this->_searchCriteriaBuilder->create();
            return $this->_brandRepository->getList($searchCriteria)->getItems();
        }
        return $this->_brandRepository->getById($id);
    }
}