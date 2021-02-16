<?php

namespace Nikolay\Brand\Setup;

use Magento\Framework\DB\Adapter\AdapterInterface;
use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{

    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        if (!$installer->tableExists('nikolay_brand_brands')) {
            $table = $installer->getConnection()->newTable(
                $installer->getTable('nikolay_brand_brands')
            )
                ->addColumn(
                    'brand_id',
                    Table::TYPE_INTEGER,
                    null,
                    [
                        'identity' => true,
                        'nullable' => false,
                        'primary'  => true,
                        'unsigned' => true,
                    ],
                    'Brand ID'
                )
                ->addColumn(
                    'brand_name',
                    Table::TYPE_TEXT,
                    255,
                    ['nullable => false'],
                    'Brand Name'
                )
                ->addColumn(
                    'brand_img',
                    Table::TYPE_TEXT,
                    255,
                    [],
                    'Brand IMG'
                )
                ->addColumn(
                    'brand_desc',
                    Table::TYPE_TEXT,
                    255,
                    [],
                    'Brand Description'
                )
                ->setComment('Brand Table');
            $installer->getConnection()->createTable($table);

            $installer->getConnection()->addIndex(
                $installer->getTable('nikolay_brand_brands'),
                $setup->getIdxName(
                    $installer->getTable('nikolay_brand_brands'),
                    ['brand_name','brand_img','brand_desc'],
                    AdapterInterface::INDEX_TYPE_FULLTEXT
                ),
                ['brand_name','brand_img','brand_desc'],
                AdapterInterface::INDEX_TYPE_FULLTEXT
            );
        }
        $installer->endSetup();
    }
}