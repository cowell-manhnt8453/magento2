<?php declare(strict_types=1);


namespace Cowell\SimpleModule\Model\ResourceModel;


class Students extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('cowell_simplemodule_students', 'students_id');
    }
}

