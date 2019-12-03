<?php

namespace SimplifiedMagento\CustomAdmin\Controller\Adminhtml\Member;

use Magento\Backend\App\Action;
use Magento\Backend\Model\View\Result\RedirectFactory;
use Magento\Framework\View\Result\PageFactory;
use SimplifiedMagento\Database\Model\AffiliateMemberFactory;

class Delete extends Action
{
    /**
     * @var AffiliateMember
     */
    protected $model;
    /**
     * @var RedirectFactory
     */
    protected $resultRedirectFactory;
    /**
     * @var PageFactory
     */
    private $pageFactory;

    protected $affiliateMember;

    public function __construct(
        AffiliateMemberFactory $affiliateMember,
        PageFactory $pageFactory,
        RedirectFactory $redirectFactory,
        Action\Context $context
    ) {
        parent::__construct($context);

        $this->affiliateMember = $affiliateMember;
        $this->resultRedirectFactory = $redirectFactory;
        $this->pageFactory = $pageFactory;
    }
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed("SimplifiedMagento_CustomAdmin::parent");
    }

    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();

        $id = $this->getRequest()->getParam('id');

        if ($id) {
            $member = $this->affiliateMember->create()->load($id);
            try {
                $member->delete();
                $this->messageManager->addSuccessMessage(__('Member Deleted'));
                return $resultRedirect->setPath('*/*/index');
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
                return $resultRedirect->setPath('*/*/edit', ['id'=>$id]);
            }
        }
        return $resultRedirect->setPath('*/*/index');
    }
}
