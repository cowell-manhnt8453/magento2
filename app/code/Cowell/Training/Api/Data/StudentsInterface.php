<?php
declare(strict_types=1);

namespace Cowell\Training\Api\Data;

interface StudentsInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{

    const AVATAR = 'avatar';
    const STATUS = 'status';
    const ADDRESS = 'address';
    const STUDENTS_ID = 'students_id';
    const AGE = 'age';
    const NAME = 'name';

    /**
     * Get students_id
     * @return string|null
     */
    public function getStudentsId();

    /**
     * Set students_id
     * @param string $studentsId
     * @return \Cowell\Training\Api\Data\StudentsInterface
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
     * @return \Cowell\Training\Api\Data\StudentsInterface
     */
    public function setName($name);

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Cowell\Training\Api\Data\StudentsExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     * @param \Cowell\Training\Api\Data\StudentsExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Cowell\Training\Api\Data\StudentsExtensionInterface $extensionAttributes
    );

    /**
     * Get address
     * @return string|null
     */
    public function getAddress();

    /**
     * Set address
     * @param string $address
     * @return \Cowell\Training\Api\Data\StudentsInterface
     */
    public function setAddress($address);

    /**
     * Get age
     * @return string|null
     */
    public function getAge();

    /**
     * Set age
     * @param string $age
     * @return \Cowell\Training\Api\Data\StudentsInterface
     */
    public function setAge($age);

    /**
     * Get avatar
     * @return string|null
     */
    public function getAvatar();

    /**
     * Set avatar
     * @param string $avatar
     * @return \Cowell\Training\Api\Data\StudentsInterface
     */
    public function setAvatar($avatar);

    /**
     * Get status
     * @return string|null
     */
    public function getStatus();

    /**
     * Set status
     * @param string $status
     * @return \Cowell\Training\Api\Data\StudentsInterface
     */
    public function setStatus($status);
}

