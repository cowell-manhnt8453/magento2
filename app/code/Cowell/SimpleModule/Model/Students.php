<?php declare(strict_types=1);


namespace Cowell\SimpleModule\Model;

use Cowell\SimpleModule\Api\Data\StudentsInterface;
use Cowell\SimpleModule\Api\Data\StudentsInterfaceFactory;
use Magento\Framework\Api\DataObjectHelper;


class Students extends \Magento\Framework\Model\AbstractModel
{

    protected $studentsDataFactory;

    protected $_eventPrefix = 'cowell_simplemodule_students';
    protected $dataObjectHelper;


    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param StudentsInterfaceFactory $studentsDataFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param \Cowell\SimpleModule\Model\ResourceModel\Students $resource
     * @param \Cowell\SimpleModule\Model\ResourceModel\Students\Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        StudentsInterfaceFactory $studentsDataFactory,
        DataObjectHelper $dataObjectHelper,
        \Cowell\SimpleModule\Model\ResourceModel\Students $resource,
        \Cowell\SimpleModule\Model\ResourceModel\Students\Collection $resourceCollection,
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

