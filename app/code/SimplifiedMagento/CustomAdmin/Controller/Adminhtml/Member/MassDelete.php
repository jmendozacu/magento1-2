<?php

namespace SimplifiedMagento\CustomAdmin\Controller\Adminhtml\Member;

use Magento\Backend\App\Action;
use Magento\Backend\Model\View\Result\RedirectFactory;
use Magento\Ui\Component\MassAction\Filter;
use SimplifiedMagento\Database\Model\ResourceModel\AffiliateMember\CollectionFactory;

class MassDelete extends Action
{
    protected $filter;
    protected $resultRedirectFactory;
    protected $collectionFactory;

    public function __construct(
        Filter $filter,
        RedirectFactory $resultRedirectFactory,
        CollectionFactory $collectionFactory,
        Action\Context $context
    ) {
        $this->filter = $filter;
        $this->resultRedirectFactory = $resultRedirectFactory;
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $collection = $this->filter->getCollection($this->collectionFactory->create());
        $collectionSize = $collection->getSize();
        foreach ($collection as $item) {
            $item->delete();
        }


        $this->messageManager->addSuccessMessage(__('Total of '.$collectionSize.' members deleted'));


        $resultRedirect = $this->resultRedirectFactory->create();

        return $resultRedirect->setPath('*/*/index');
    }
}
