<?php

namespace SimplifiedMagento\Database\Api\Data;

interface AffiliateMemberInterface
{
    const NAME = "name";
    const ID = "entity_id";
    const ADDRESS = "address";
    const CREATED_AT = "created_at";
    const STATUS = "status";

    /**
     * @return int
     */
    public function getId();

    /**
     * @return string
     */

    public function getName();

    /**
     * @return string
     */
    public function getAddress();

    /**
     * @return boolean
     */

    public function getStatus();

    /**
     * @return string
     */

    public function getCreatedAt();



    /**
     * @param int $id
     * @return \SimplifiedMagento\Database\Api\Data\AffiliateMemberInterface
     */

    public function setId($id);

    /**
     * @param string $name
     * @return \SimplifiedMagento\Database\Api\Data\AffiliateMemberInterface
     */

    public function setName($name);

    /**
     * @param string $address
     * @return \SimplifiedMagento\Database\Api\Data\AffiliateMemberInterface
     */

    public function setAddress($address);

    /**
     * @param boolean $status
     * @return \SimplifiedMagento\Database\Api\Data\AffiliateMemberInterface
     */

    public function setStatus($status);

    /**
     * @param string $createdAt
     * @return \SimplifiedMagento\Database\Api\Data\AffiliateMemberInterface
     */
    public function setCreatedAt($createdAt);
}
