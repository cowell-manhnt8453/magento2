<?php declare(strict_types=1);


namespace Cowell\SimpleModule\Model\ResourceModel\Students;


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
            \Cowell\SimpleModule\Model\Students::class,
            \Cowell\SimpleModule\Model\ResourceModel\Students::class
        );
    }
}

