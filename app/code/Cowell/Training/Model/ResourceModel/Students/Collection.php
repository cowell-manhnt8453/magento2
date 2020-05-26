<?php
declare(strict_types=1);

namespace Cowell\Training\Model\ResourceModel\Students;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * @var string
     */
    protected $_idFieldName = 'students_id';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            \Cowell\Training\Model\Students::class,
            \Cowell\Training\Model\ResourceModel\Students::class
        );
    }
}

