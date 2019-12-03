<?php

namespace SimplifiedMagento\FirstModule\Cron;

use SimplifiedMagento\Database\Model\AffiliateMemberFactory;

class AddItem
{
    private $affiliateMemberFactory;
    public function __construct(AffiliateMemberFactory $affiliateMemberFactory)
    {
        $this->affiliateMemberFactory = $affiliateMemberFactory;
    }

    public function execute()
    {
        $this->affiliateMemberFactory->create()
            ->setName('Sechedule cron')
            ->setDescription('created at ' . time())
            ->save();
    }
}
