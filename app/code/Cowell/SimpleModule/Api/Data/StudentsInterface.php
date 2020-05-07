<?php


namespace Cowell\SimpleModule\Api\Data;


interface StudentsInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{

    const NAME = 'name';
    const STUDENTS_ID = 'students_id';
    const GENDER = 'gender';
    const ADDRESS = 'address';

    /**
     * Get students_id
     * @return string|null
     */
    public function getStudentsId();

    /**
     * Set students_id
     * @param string $studentsId
     * @return \Cowell\SimpleModule\Api\Data\StudentsInterface
     */
    public function setStudentsId($studentsId);

    /**
     * Get name
     * @return string|null
     */
    public function getName();

    /**
     * Set name
     * @param string $name
     * @return \Cowell\SimpleModule\Api\Data\StudentsInterface
     */
    public function setName($name);

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Cowell\SimpleModule\Api\Data\StudentsExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     * @param \Cowell\SimpleModule\Api\Data\StudentsExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Cowell\SimpleModule\Api\Data\StudentsExtensionInterface $extensionAttributes
    );

    /**
     * Get gender
     * @return string|null
     */
    public function getGender();

    /**
     * Set gender
     * @param string $gender
     * @return \Cowell\SimpleModule\Api\Data\StudentsInterface
     */
    public function setGender($gender);

    /**
     * Get address
     * @return string|null
     */
    public function getAddress();

    /**
     * Set address
     * @param string $address
     * @return \Cowell\SimpleModule\Api\Data\StudentsInterface
     */
    public function setAddress($address);
}

