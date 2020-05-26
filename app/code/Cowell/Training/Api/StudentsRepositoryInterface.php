<?php
declare(strict_types=1);

namespace Cowell\Training\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface StudentsRepositoryInterface
{

    /**
     * Save students
     * @param \Cowell\Training\Api\Data\StudentsInterface $students
     * @return \Cowell\Training\Api\Data\StudentsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Cowell\Training\Api\Data\StudentsInterface $students
    );

    /**
     * Retrieve students
     * @param string $studentsId
     * @return \Cowell\Training\Api\Data\StudentsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($studentsId);

    /**
     * Retrieve students matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Cowell\Training\Api\Data\StudentsSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete students
     * @param \Cowell\Training\Api\Data\StudentsInterface $students
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Cowell\Training\Api\Data\StudentsInterface $students
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

