<?php


namespace Cowell\SimpleModule\Api;

use Magento\Framework\Api\SearchCriteriaInterface;


interface StudentsRepositoryInterface
{

    /**
     * Save students
     * @param \Cowell\SimpleModule\Api\Data\StudentsInterface $students
     * @return \Cowell\SimpleModule\Api\Data\StudentsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Cowell\SimpleModule\Api\Data\StudentsInterface $students
    );

    /**
     * Retrieve students
     * @param string $studentsId
     * @return \Cowell\SimpleModule\Api\Data\StudentsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($studentsId);

    /**
     * Retrieve students matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Cowell\SimpleModule\Api\Data\StudentsSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete students
     * @param \Cowell\SimpleModule\Api\Data\StudentsInterface $students
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Cowell\SimpleModule\Api\Data\StudentsInterface $students
    );

    /**
     * Delete students by ID
     * @param string $studentsId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($studentsId);
}

