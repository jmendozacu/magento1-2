<?php
namespace SimplifiedMagento\CustomAdmin\Controller\Adminhtml\Member;

use Magento\Backend\App\Action;
use Magento\Backend\Model\View\Result\RedirectFactory;
use Magento\Framework\View\Result\PageFactory;
use SimplifiedMagento\Database\Model\AffiliateMemberFactory;

class Save extends Action
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
        $data = $this->getRequest()->getPostValue();

        $resultRedirect = $this->resultRedirectFactory->create();
        if ($data['entity_id'] == null) {
            unset($data['entity_id']);
            $newmember = $this->affiliateMember->create();
        } else {
            $newmember = $this->affiliateMember->create()->load($data['entity_id']);
        }
        $newmember->setData($data);

        try {
            $newmember->save();
            $this->messageManager->addSuccessMessage(__('Affiliate Member Saved Successfully'));
            $this->_getSession()->setFormData(false);
            if ($this->getRequest()->getParam('back')) {
                return $resultRedirect->setPath('*/*/edit', ['id' =>$newmember->getId(), '_current' => true]);
            }
            return $resultRedirect->setPath('*/*/index');
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        }

        return $resultRedirect->setPath('*/*/index');
    }
}
