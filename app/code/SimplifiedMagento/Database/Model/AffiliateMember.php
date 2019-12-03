<?php

namespace SimplifiedMagento\Database\Model;

use Magento\Framework\Model\AbstractExtensibleModel;
use Magento\Framework\Model\AbstractModel;
use SimplifiedMagento\Database\Api\Data\AffiliateMemberInterface;
use SimplifiedMagento\Database\Model\ResourceModel\AffiliateMember as AffiliateMemberResource;

class AffiliateMember extends AbstractExtensibleModel implements AffiliateMemberInterface
{
    protected function _construct()
    {
        $this->_init(AffiliateMemberResource::class);
    }

    /**
     * @return string
     */
    public function getName()
    {
        // TODO: Implement getName() method.
        return $this->getData(AffiliateMemberInterface::NAME);
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        // TODO: Implement getAddress() method.
        return $this->getData(AffiliateMemberInterface::ADDRESS);
    }

    /**
     * @return boolean
     */
    public function getStatus()
    {
        // TODO: Implement getStatus() method.
        return $this->getData(AffiliateMemberInterface::STATUS);
    }

    /**
     * @return string
     */
    public function getCreatedAt()
    {
        // TODO: Implement getCreatedAt() method.
        return $this->getData(AffiliateMemberInterface::CREATED_AT);
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->getData(AffiliateMemberInterface::ID);
    }

    /**
     * @param string $name
     * @return \SimplifiedMagento\Database\Api\Data\AffiliateMemberInterface
     */
    public function setName($name)
    {
        // TODO: Implement setName() method.
        $this->setData(AffiliateMemberInterface::NAME, $name);
    }

    /**
     * @param string $address
     * @return \SimplifiedMagento\Database\Api\Data\AffiliateMemberInterface
     */
    public function setAddress($address)
    {
        // TODO: Implement setAddress() method.
        $this->setData(AffiliateMemberInterface::ADDRESS, $address);
    }

    /**
     * @param bool $status
     * @return \SimplifiedMagento\Database\Api\Data\AffiliateMemberInterface
     */
    public function setStatus($status)
    {
        // TODO: Implement setStatus() method.
        $this->setData(AffiliateMemberInterface::STATUS, $status);
    }

    /**
     * @param string $createdAt
     * @return \SimplifiedMagento\Database\Api\Data\AffiliateMemberInterface
     */
    public function setCreatedAt($createdAt)
    {
        // TODO: Implement setCreatedAt() method.
        $this->setData(AffiliateMemberInterface::CREATED_AT, $createdAt);
    }

    /**
     * @return \SimplifiedMagento\Database\Api\Data\AffiliateMemberExtensionInterface
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * @param SimplifiedMagento\Database\Api\Data\AffiliateMemberExtensionInterface $affiliateMemberExtension
     * @return $this
     */
    public function setExtensionAttributes(\SimplifiedMagento\Database\Api\Data\AffiliateMemberExtensionInterface $affiliateMemberExtension)
    {
        return $this->_setExtensionAttributes($affiliateMemberExtension);
    }



}
