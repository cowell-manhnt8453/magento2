<?php declare(strict_types=1);


namespace Cowell\SimpleModule\Model\Data;

use Cowell\SimpleModule\Api\Data\StudentsInterface;


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
     * @return \Cowell\SimpleModule\Api\Data\StudentsInterface
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
     * @return \Cowell\SimpleModule\Api\Data\StudentsInterface
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Cowell\SimpleModule\Api\Data\StudentsExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set an extension attributes object.
     * @param \Cowell\SimpleModule\Api\Data\StudentsExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Cowell\SimpleModule\Api\Data\StudentsExtensionInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }

    /**
     * Get gender
     * @return string|null
     */
    public function getGender()
    {
        return $this->_get(self::GENDER);
    }

    /**
     * Set gender
     * @param string $gender
     * @return \Cowell\SimpleModule\Api\Data\StudentsInterface
     */
    public function setGender($gender)
    {
        return $this->setData(self::GENDER, $gender);
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
     * @return \Cowell\SimpleModule\Api\Data\StudentsInterface
     */
    public function setAddress($address)
    {
        return $this->setData(self::ADDRESS, $address);
    }
}

