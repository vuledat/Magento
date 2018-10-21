<?php
namespace Jeff\Slider\Setup;
class InstallData implements \Magento\Framework\Setup\InstallDataInterface
{
    public function install(\Magento\Framework\Setup\ModuleDataSetupInterface $setup, \Magento\Framework\Setup\ModuleContextInterface $context)
    {
        $setup->startSetup();

        if(version_compare($context->getVersion(), '0.0.2') < 0) {
            $tableName = $setup->getTable('jeff_slider_slide');
            if($setup->getConnection()->isTableExists($tableName) == true ) {
                $data = [
                    ['title' => 'one slide'], ['title' => 'two slide'], ['title' => 'three slide']
                ];

                foreach($data as $item) {
                    $setup->getConnection()->insert($tableName, $item);
                }
            }
        }

        $setup->endSetup();
    }
}
