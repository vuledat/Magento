<?php
namespace Magestore\Multivendor\Setup;
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
        $installer->getConnection()->dropTable($installer->getTable('multivendor_vendor'));
        $installer->getConnection()->dropTable($installer->getTable('multivendor_vendor_product'));
        $table = $installer->getConnection()->newTable(
            $installer->getTable('multivendor_vendor')
        )->addColumn(
            'vendor_id', Table::TYPE_INTEGER, null,
            ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
            'vendor_id ID'
        )->addColumn(
            'vendor_code', Table::TYPE_TEXT, 30,
            ['nullable' => false, 'default' => ''],
            'Vendor Code'
        )->addColumn(
            'name', Table::TYPE_TEXT, null,
            ['nullable' => false, 'default' => ''],
            'Name'
        )->addColumn(
            'description', Table::TYPE_TEXT, null,['nullable' => true],
            'Description'
        )->addColumn(
            'logo', Table::TYPE_TEXT, null,
            ['nullable' => true],
            'Logo'
        )->addColumn(
            'created_at', Table::TYPE_DATETIME, null,
            ['nullable' => true],
            'Created At'
        )->addColumn(
            'updated_at', Table::TYPE_DATETIME, null,
            ['nullable' => true],
            'updated_at'
        )->addColumn(
            'address', Table::TYPE_TEXT, null,
            ['nullable' => false, 'default' => ''],
            'Address'
        )->addColumn(
            'phone', Table::TYPE_TEXT, null,
            ['nullable' => false, 'default' => ''],
            'Phone'
        )->addColumn(
            'status', Table::TYPE_SMALLINT, null,
            ['nullable' => false, 'default' => '1'],
            'Status' );
        $installer->getConnection()->createTable($table);
        $table = $installer->getConnection()->newTable(
            $installer->getTable('multivendor_vendor_product')
        )->addColumn(
            'vendor_product_id', Table::TYPE_INTEGER, null,
            ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
            'ID'
        )->addColumn(
            'vendor_id', Table::TYPE_INTEGER, null,['nullable' => false, 'unsigned' => true],
            'Vendor Id'
        )->addColumn(
            'product_ids', Table::TYPE_TEXT, null,
            ['nullable' => false, 'unsigned' => true],
            'Product Ids'
        )->addForeignKey(
            $installer->getFkName(
                'multivendor_vendor_product',
                'vendor_id',
                'multivendor_vendor',
                'vendor_id'
            ),
            'vendor_id',
            $installer->getTable('multivendor_vendor'),
            'vendor_id',
            Table::ACTION_CASCADE
        );
        $installer->getConnection()->createTable($table);
        $installer->endSetup();
    }
}