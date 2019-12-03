<?php

namespace SimplifiedMagento\CustomAdmin\Controller\Adminhtml\Member;

use Magento\Backend\App\Action;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use SimplifiedMagento\Database\Model\AffiliateMember;

class Edit extends Action
{
    protected $registry;
    protected $pageFactory;
    protected $affiliateMember;
    public function __construct(
        AffiliateMember $affiliateMember,
        PageFactory $pageFactory,
        Registry $registry,
        Action\Context $context
    ) {
        $this->registry = $registry;
        $this->affiliateMember = $affiliateMember;
        $this->pageFactory = $pageFactory;
        parent::__construct($context);
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('SimplifiedMagento_CustomAdmin::parent');
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
        $id = $this->getRequest()->getParam('id');

        $model = $this->affiliateMember;
        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addErrorMessage(__('Member does not exist.'));
                $result =  $this->resultRedirectFactory->create();
                $result->setPath('affiliate/member/index');
            }
        }

        $data = $this->_getSession()->getFormData(true);

        if (!empty($data)) {
            $model->setData($data);
        }

        $this->registry->register('member', $model);

        /** @var \Magento\Framework\View\Result\Page $resultPage */
        $resultPage = $this->pageFactory->create();

        //$resultPage->addBreadcrumb($id ? __('Edit Member'): __('Add a New Member'));

        if ($id) {
            $resultPage->getConfig()->getTitle()->prepend('Edit');
        } else {
            $resultPage->getConfig()->getTitle()->prepend('Add');
        }

        return $resultPage;
    }
}
