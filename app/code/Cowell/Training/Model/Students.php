<?php
declare(strict_types=1);

namespace Cowell\Training\Model;

use Cowell\Training\Api\Data\StudentsInterface;
use Cowell\Training\Api\Data\StudentsInterfaceFactory;
use Magento\Framework\Api\DataObjectHelper;

class Students extends \Magento\Framework\Model\AbstractModel
{

    protected $dataObjectHelper;

    protected $studentsDataFactory;

    protected $_eventPrefix = 'cowell_training_students';

    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param StudentsInterfaceFactory $studentsDataFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param \Cowell\Training\Model\ResourceModel\Students $resource
     * @param \Cowell\Training\Model\ResourceModel\Students\Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        StudentsInterfaceFactory $studentsDataFactory,
        DataObjectHelper $dataObjectHelper,
        \Cowell\Training\Model\ResourceModel\Students $resource,
        \Cowell\Training\Model\ResourceModel\Students\Collection $resourceCollection,
        array $data = []
    ) {
        $this->studentsDataFactory = $studentsDataFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Retrieve students model with students data
     * @return StudentsInterface
     */
    public function getDataModel()
    {
        $studentsData = $this->getData();
        
        $studentsDataObject = $this->studentsDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $studentsDataObject,
            $studentsData,
            StudentsInterface::class
        );
        
        return $studentsDataObject;
    }
}

