<?php
declare(strict_types=1);

namespace Cowell\Training\Model;

use Cowell\Training\Api\Data\StudentsInterfaceFactory;
use Cowell\Training\Api\Data\StudentsSearchResultsInterfaceFactory;
use Cowell\Training\Api\StudentsRepositoryInterface;
use Cowell\Training\Model\ResourceModel\Students as ResourceStudents;
use Cowell\Training\Model\ResourceModel\Students\CollectionFactory as StudentsCollectionFactory;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Store\Model\StoreManagerInterface;

class StudentsRepository implements StudentsRepositoryInterface
{

    protected $extensionAttributesJoinProcessor;

    protected $dataObjectProcessor;

    private $storeManager;

    protected $studentsCollectionFactory;

    protected $searchResultsFactory;

    private $collectionProcessor;

    protected $studentsFactory;

    protected $dataObjectHelper;

    protected $dataStudentsFactory;

    protected $resource;

    protected $extensibleDataObjectConverter;

    /**
     * @param ResourceStudents $resource
     * @param StudentsFactory $studentsFactory
     * @param StudentsInterfaceFactory $dataStudentsFactory
     * @param StudentsCollectionFactory $studentsCollectionFactory
     * @param StudentsSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     * @param CollectionProcessorInterface $collectionProcessor
     * @param JoinProcessorInterface $extensionAttributesJoinProcessor
     * @param ExtensibleDataObjectConverter $extensibleDataObjectConverter
     */
    public function __construct(
        ResourceStudents $resource,
        StudentsFactory $studentsFactory,
        StudentsInterfaceFactory $dataStudentsFactory,
        StudentsCollectionFactory $studentsCollectionFactory,
        StudentsSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager,
        CollectionProcessorInterface $collectionProcessor,
        JoinProcessorInterface $extensionAttributesJoinProcessor,
        ExtensibleDataObjectConverter $extensibleDataObjectConverter
    ) {
        $this->resource = $resource;
        $this->studentsFactory = $studentsFactory;
        $this->studentsCollectionFactory = $studentsCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataStudentsFactory = $dataStudentsFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
        $this->collectionProcessor = $collectionProcessor;
        $this->extensionAttributesJoinProcessor = $extensionAttributesJoinProcessor;
        $this->extensibleDataObjectConverter = $extensibleDataObjectConverter;
    }

    /**
     * {@inheritdoc}
     */
    public function save(
        \Cowell\Training\Api\Data\StudentsInterface $students
    ) {
        /* if (empty($students->getStoreId())) {
            $storeId = $this->storeManager->getStore()->getId();
            $students->setStoreId($storeId);
        } */
        
        $studentsData = $this->extensibleDataObjectConverter->toNestedArray(
            $students,
            [],
            \Cowell\Training\Api\Data\StudentsInterface::class
        );
        
        $studentsModel = $this->studentsFactory->create()->setData($studentsData);
        
        try {
            $this->resource->save($studentsModel);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the students: %1',
                $exception->getMessage()
            ));
        }
        return $studentsModel->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function get($studentsId)
    {
        $students = $this->studentsFactory->create();
        $this->resource->load($students, $studentsId);
        if (!$students->getId()) {
            throw new NoSuchEntityException(__('students with id "%1" does not exist.', $studentsId));
        }
        return $students->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->studentsCollectionFactory->create();
        
        $this->extensionAttributesJoinProcessor->process(
            $collection,
            \Cowell\Training\Api\Data\StudentsInterface::class
        );
        
        $this->collectionProcessor->process($criteria, $collection);
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $items = [];
        foreach ($collection as $model) {
            $items[] = $model->getDataModel();
        }
        
        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(
        \Cowell\Training\Api\Data\StudentsInterface $students
    ) {
        try {
            $studentsModel = $this->studentsFactory->create();
            $this->resource->load($studentsModel, $students->getStudentsId());
            $this->resource->delete($studentsModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the students: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($studentsId)
    {
        return $this->delete($this->get($studentsId));
    }
}

