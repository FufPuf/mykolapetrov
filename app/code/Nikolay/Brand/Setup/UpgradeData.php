<?php

namespace Nikolay\Brand\Setup;

use Magento\Catalog\Model\Product;
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Nikolay\Brand\Model\BrandFactory;
use Magento\Eav\Setup\EavSetupFactory;

class UpgradeData implements UpgradeDataInterface
{
    protected $_brandFactory;
    /**
     * Eav setup factory
     * @var EavSetupFactory
     */
    private $_eavSetupFactory;

    public function __construct(
        BrandFactory $brandFactory,
        EavSetupFactory $eavSetupFactory)
    {
        $this->_brandFactory = $brandFactory;
        $this->_eavSetupFactory = $eavSetupFactory;
    }

    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $eavSetup = $this->_eavSetupFactory->create();
        $eavSetup->addAttribute(
            Product::ENTITY,
            'brands',
            [
                'group' => 'General',
                'type' => 'varchar',
                'label' => 'Brand',
                'input' => 'select',
                'source' => 'Nikolay\Brand\Model\Attribute\Source\Brand',
                'frontend' => 'Nikolay\Brand\Model\Attribute\Frontend\Brand',
                'backend' => 'Nikolay\Brand\Model\Attribute\Backend\Brand',
                'required' => false,
                'sort_order' => 50,
                'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'visible' => true,
                'is_html_allowed_on_front' => true,
                'visible_on_front' => true
            ]
        );

       if (version_compare($context->getVersion(), '1.1.0', '<')) {
            $adidas = [
                'brand_name' => "Adidas",
                'brand_img'  => "https://upload.wikimedia.org/wikipedia/commons/thumb/2/20/Adidas_Logo.svg/1200px-Adidas_Logo.svg.png",
                'brand_desc' => "Adidas AG (stylized as adidas since 1949) is a German multinational corporation, founded and headquartered in Herzogenaurach, Germany, that designs and manufactures shoes, clothing and accessories. It is the largest sportswear manufacturer in Europe, and the second largest in the world, after Nike. It is the holding company for the Adidas Group, which consists of the Reebok sportswear company, 8.33% of the German football club Bayern München, and Runtastic, an Austrian fitness technology company. Adidas' revenue for 2018 was listed at €21.915 billion",
            ];

            $brand = $this->_brandFactory->create();
            $brand->addData($adidas)->save();
        }

       if (version_compare($context->getVersion(), '1.1.0', '<')) {
            $nike = [
                'brand_name' => "Nike",
                'brand_img'  => "http://pngimg.com/uploads/nike/nike_PNG5.png",
                'brand_desc' => "NIKE, Inc. is an American multinational corporation that is engaged in the design, development, manufacturing, and worldwide marketing and sales of footwear, apparel, equipment, accessories, and services. The company is headquartered near Beaverton, Oregon, in the Portland metropolitan area. It is the world's largest supplier of athletic shoes and apparel and a major manufacturer of sports equipment, with revenue in excess of US$37.4 billion in its fiscal year 2020 (ending May 31, 2020). As of 2020, it employed 76,700 people worldwide. In 2020 the brand alone was valued in excess of $32 billion, making it the most valuable brand among sports businesses. Previously in 2017, the Nike brand was valued at $29.6 billion. Nike ranked No. 89 in the 2018 Fortune 500 list of the largest United States corporations by total revenue.",
            ];

            $brand = $this->_brandFactory->create();
            $brand->addData($nike)->save();
        }

       if (version_compare($context->getVersion(), '1.1.0', '<')) {
            $data = [
                'brand_name' => "Columbia",
                'brand_img'  => "https://i.pinimg.com/originals/0a/b8/da/0ab8dae2ba3543f6043ac661db9f6101.png",
                'brand_desc' => "Columbia Sportswear began as a family-owned hat distributor. Immediate-past chairwoman Gert Boyle's parents, Paul and Marie Lamfrom, fled Nazi Germany in 1937 and immediately purchased a Portland hat distributorship. The company became Columbia Hat Company, named for the nearby Columbia River. In 1948, Gert married Neal Boyle, who became the head of the company. Frustrations over suppliers influenced the family to start manufacturing their own products, and Columbia Hat Company became Columbia Sportswear Company in 1960.",
            ];
            $brand = $this->_brandFactory->create();
            $brand->addData($data)->save();
        }
    }
}