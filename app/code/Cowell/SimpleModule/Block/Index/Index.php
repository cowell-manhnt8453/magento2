<?php


namespace Cowell\SimpleModule\Block\Index;

use Cowell\SimpleModule\Api\Data\StudentsInterface;
use Cowell\SimpleModule\Api\StudentsRepositoryInterface;
use Cowell\SimpleModule\Model\StudentsRepository;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\SortOrder;
use Magento\Framework\Api\SortOrderBuilder;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

class Index extends \Magento\Framework\View\Element\Template
{
    /**
     * @var StudentsRepository
     */
    private $studentReponsitory;
    /**
     * @var SearchCriteriaBuilder
     */
    private $searchCriteriaBuilder;
    /**
     * @var SortOrderBuilder
     */
    private $sortOrderBuilder;
    /**
     * Constructor
     * @param StudentsRepositoryInterface $studentReponsitory
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param SortOrderBuilder $sortOrderBuilder
     * @param \Magento\Framework\View\Element\Template\Context  $context
     * @param array $data
     */
    public function __construct(
        StudentsRepositoryInterface $studentReponsitory,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        SortOrderBuilder $sortOrderBuilder,
        \Magento\Framework\View\Element\Template\Context $context,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->studentReponsitory = $studentReponsitory;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->sortOrderBuilder = $sortOrderBuilder;
    }
    public function getStudents()
    {
        $sortOrder = $this->sortOrderBuilder
            ->setField('entity_id')
            ->setDirection(SortOrder::SORT_DESC)
            ->create();
        $this->searchCriteriaBuilder->addSortOrder($sortOrder);

        $this->searchCriteriaBuilder
            ->setPageSize(5)
            ->setCurrentPage(1);

        $criteria = $this->searchCriteriaBuilder->create();

        $students = $this->studentReponsitory
            ->getList($criteria)
            ->getItems();

        return $students;
    }
}

