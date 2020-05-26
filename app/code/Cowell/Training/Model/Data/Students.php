<?php
declare(strict_types=1);

namespace Cowell\Training\Model\Data;

use Cowell\Training\Api\Data\StudentsInterface;

class Students extends \Magento\Framework\Api\AbstractExtensibleObject implements StudentsInterface
{

    /**
     * Get students_id
     * @return string|null
     */
    public function getStudentsId()
    {
        return $this->_get(self::STUDENTS_ID);
    }

    /**
     * Set students_id
     * @param string $studentsId
     * @return \Cowell\Training\Api\Data\StudentsInterface
     */
    public function setStudentsId($studentsId)
    {
        return $this->setData(self::STUDENTS_ID, $studentsId);
    }

    /**
     * Get name
     * @return string|null
     */
    public function getName()
    {
        return $this->_get(self::NAME);
    }

    /**
     * Set name
     * @param string $name
     * @return \Cowell\Training\Api\Data\StudentsInterface
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Cowell\Training\Api\Data\StudentsExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set an extension attributes object.
     * @param \Cowell\Training\Api\Data\StudentsExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Cowell\Training\Api\Data\StudentsExtensionInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }

    /**
     * Get address
     * @return string|null
     */
    public function getAddress()
    {
        return $this->_get(self::ADDRESS);
    }

    /**
     * Set address
     * @param string $address
     * @return \Cowell\Training\Api\Data\StudentsInterface
     */
    public function setAddress($address)
    {
        return $this->setData(self::ADDRESS, $address);
    }

    /**
     * Get age
     * @return string|null
     */
    public function getAge()
    {
        return $this->_get(self::AGE);
    }

    /**
     * Set age
     * @param string $age
     * @return \Cowell\Training\Api\Data\StudentsInterface
     */
    public function setAge($age)
    {
        return $this->setData(self::AGE, $age);
    }

    /**
     * Get avatar
     * @return string|null
     */
    public function getAvatar()
    {
        return $this->_get(self::AVATAR);
    }

    /**
     * Set avatar
     * @param string $avatar
     * @return \Cowell\Training\Api\Data\StudentsInterface
     */
    public function setAvatar($avatar)
    {
        return $this->setData(self::AVATAR, $avatar);
    }

    /**
     * Get status
     * @return string|null
     */
    public function getStatus()
    {
        return $this->_get(self::STATUS);
    }

    /**
     * Set status
     * @param string $status
     * @return \Cowell\Training\Api\Data\StudentsInterface
     */
    public function setStatus($status)
    {
        return $this->setData(self::STATUS, $status);
    }
}

