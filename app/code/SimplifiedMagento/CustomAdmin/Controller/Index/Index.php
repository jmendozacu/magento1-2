<?php


namespace SimplifiedMagento\CustomAdmin\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;

class Index extends Action
{
    private $scopeconfig;
    public function __construct(Context $context,ScopeConfigInterface $scopeConfig)
    {
        $this->scopeconfig = $scopeConfig;
        parent::__construct($context);
    }

    /**
     * Execute action based on request and return result
     *
     * Note: Request will be added as operation argument in future
     *
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function execute()
    {
        echo $this->scopeconfig->getValue('Firstsection/Firstgroup/Firstfield');
        print_r ($this->scopeconfig->getValue('Firstsection/Firstgroup/Thirdfield'));
    }
}