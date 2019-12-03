<?php

namespace SimplifiedMagento\CustomAdmin\Block\Adminhtml\Member\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class ResetButton extends Generic implements ButtonProviderInterface
{
    /**
     * Retrieve button-specified settings
     *
     * @return array
     */
    public function getButtonData()
    {
        return [
            'label' => __('Reset'),
            'class' => 'reset',
            'on_click' => 'location.relaod();',
            'sort_order' => 40
            ];
    }
}
