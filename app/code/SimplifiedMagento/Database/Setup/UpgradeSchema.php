<?php

namespace SimplifiedMagento\Database\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Db\Ddl\Table;

class UpgradeSchema implements UpgradeSchemaInterface
{
    public function upgrade( SchemaSetupInterface $setup, ModuleContextInterface $context )
    {
        $setup->startSetup();

        if(version_compare($context->getVersion(), '1.2.0', '<'))
        {
            $setup->getConnection()->addColumn(
                $setup->getTable( 'affiliate_member' ),
                    'test',
                    [
                    'type' => Table::TYPE_DECIMAL,
                    'nullable' => true,
                    'length' => '12,4',
                    'comment' => 'test',
                    'after' => 'status'
                    ]
            );
        }

        $setup->endSetup();
    }
}
