<?php
namespace ProductVendor\Product\Setup;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;
/**
 * Class InstallSchema* @package Magestore\Multivendor\Setup
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @throws \Zend_Db_Exception
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        /*
         * Drop tables if exists
         */
        $installer->getConnection()->dropTable($installer->getTable('products'));
        //$installer->getConnection()->dropTable($installer->getTable('multivendor_vendor_product'));
        $table = $installer->getConnection()->newTable(
            $installer->getTable('products')
        )->addColumn(
            'product_id', Table::TYPE_INTEGER, null,
            ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
            'product_id ID'
        )->addColumn(
            'name', Table::TYPE_TEXT, null,
            ['nullable' => false, 'default' => ''],
            'Name'
        )->addColumn(
            'price', Table::TYPE_INTEGER, null,
            ['nullable' => false, 'default' => '100'],
            'Price'
        )
            ->addColumn(
            'description', Table::TYPE_TEXT, null,['nullable' => true],
            'Description'
        )->addColumn(
                'img', Table::TYPE_TEXT, null,
                ['nullable' => true],
                'Img'
         )->addColumn(
            'created_at', Table::TYPE_DATETIME, null,
            ['nullable' => true],
            'Created At'
        )->addColumn(
            'updated_at', Table::TYPE_DATETIME, null,
            ['nullable' => true],
            'updated_at'
        );

        $installer->getConnection()->createTable($table);
        $installer->endSetup();
    }
}