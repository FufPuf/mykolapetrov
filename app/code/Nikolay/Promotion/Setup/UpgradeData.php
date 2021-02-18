<?php

namespace Nikolay\Promotion\Setup;

use Exception;
use Magento\Cms\Model\BlockFactory;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;

class UpgradeData implements UpgradeDataInterface
{
    /**
     * @var BlockFactory
     */
    private $_blockFactory;

    /**
     * UpgradeData constructor
     *
     * @param BlockFactory $blockFactory
     */
    public function __construct(
        BlockFactory $blockFactory
    )
    {
        $this->_blockFactory = $blockFactory;
    }

    /**
     * Upgrade data for the module
     *
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     * @throws Exception
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        if (version_compare($context->getVersion(), '1.0.1') < 0) {
            $cmsBlock = $this->_blockFactory->create()->load('test-block', 'identifier');

            $cmsBlockData = [
                'title' => 'promotion block',
                'identifier' => 'promotion_block',
                'is_active' => 1,
                'stores' => [0],
                'content' => '<div class="promo_block" style="border: 2px solid #5d5b5b38; display: flex; align-items: center; flex-direction: column; padding: 15px;">
                                  <p><strong>100$ Store Credit for you, 100$ Store Credit for your friends</strong></p>
                                  <p>Tell your friends to enter your coupon and They will receive 30% of their first purchase</p>
                              </div>',
            ];

            if (!$cmsBlock->getId()) {
                $this->_blockFactory->create()->setData($cmsBlockData)->save();
            } else {
                $cmsBlock->setContent($cmsBlockData['content'])->save();
            }
        }

        $setup->endSetup();
    }
}