<?php

namespace SimplifiedMagento\Database\Setup;

use Magento\Framework\Db\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{

    /**
     * Installs DB schema for a module
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     * @throws \Zend_Db_Exception
     */
    public function install(\Magento\Framework\Setup\SchemaSetupInterface $setup, \Magento\Framework\Setup\ModuleContextInterface $context)
    {
        $setup->startSetup();

        if (!$setup->tableExists('affiliate_member')) {
            $table = $setup->getConnection()->newTable(
                $setup->getTable('affiliate_member')
            )->addColumn(
                'entity_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                [
                        'identity' => true,
                        'nullable' => false,
                        'primary'  => true,
                        'unsigned' => true,
                    ],
                'entity ID'
            )->addColumn(
                'name',
                Table::TYPE_TEXT,
                255,
                ['nullable' => false],
                'name of member'
            )->addColumn(
                'address',
                Table::TYPE_TEXT,
                255,
                ['nullable' => false],
                'address of member'
            )->addColumn(
                'status',
                Table::TYPE_BOOLEAN,
                10,
                ['nullable' => false, 'default' => false],
                'status of member'
            )->addColumn(
                'created_at',
                Table::TYPE_TIMESTAMP,
                null,
                ['nullable' => false, 'default' => Table::TIMESTAMP_INIT],
                'member created time'
            )->addColumn(
                'updated_at',
                Table::TYPE_TIMESTAMP,
                null,
                ['nullable' => false, 'default' => Table::TIMESTAMP_INIT_UPDATE]
            )->setComment(
                'affiliate member table'
            );

            $setup->getConnection()->createTable($table);
        }
        $setup->endSetup();
    }
}
