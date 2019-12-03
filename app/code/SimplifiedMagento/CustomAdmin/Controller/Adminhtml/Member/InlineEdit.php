<?php

namespace SimplifiedMagento\CustomAdmin\Controller\Adminhtml\Member;

use Magento\Backend\App\Action;
use Magento\Framework\Controller\Result\JsonFactory;
use SimplifiedMagento\Database\Model\AffiliateMember;

class InlineEdit extends Action
{
    protected $affiliateMember;
    protected $jsonFactory;

    public function __construct(
        AffiliateMember $affiliateMember,
        JsonFactory $jsonFactory,
        Action\Context $context
    ) {
        $this->affiliateMember = $affiliateMember;
        $this->jsonFactory = $jsonFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultJson = $this->jsonFactory->create();
        $error = false;
        $messages = [];

        if ($this->getRequest()->getParam('isAjax')) {
            $postItems = $this->getRequest()->getParam('items', []);
            if (!count($postItems)) {
                $messages[] = __('Please correct the data sent.');
                $error = true;
            } else {
                foreach (array_keys($postItems) as $modelId) {
                    $model = $this->affiliateMember->load($modelId);
                    try {
                        $model->setData(array_merge($model->getData(), $postItems[$modelId]));
                        $model->save();
                    } catch (\Exception $e) {
                        $messages[] = $e->getMessage();
                        $error = true;
                    }
                }
            }
        }

        return $resultJson->setData([
            'messages' => $messages,
            'error' => $error
        ]);
    }
}
