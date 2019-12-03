<?php

namespace SimplifiedMagento\Attribute\Model\Plugin;

use \SimplifiedMagento\Database\Api\Data\AffiliateMemberExtensionFactory;
use \SimplifiedMagento\Database\Model\AffiliatedMemberRepository;

class CodeAttributeExtension
{
    protected $extensionFactory;

    public function __construct(AffiliateMemberExtensionFactory $extensionFactory)
    {
        $this->extensionFactory = $extensionFactory;
    }

    public function aroundGetAffiliateMemberById(
        AffiliatedMemberRepository $affiliatedMemberRepository,
        \Closure $proceed,
        $id
    ) {
        $model = $proceed($id);
        $extensionAttributes = $model->getExtensionAttributes();
        if ($extensionAttributes == null) {
            $extensionAttributes =  $this->extensionFactory->create();
        }

        $extensionAttributes->setCode("Code #" . $id);
        $model->setExtensionAttributes($extensionAttributes);
        return $model;
    }
}
