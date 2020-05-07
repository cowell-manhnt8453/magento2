<?php
/**
 * Copyright © CO-WELL Co., LTD. All rights reserved.
 * Copyright © CO-WELL ASIA Co., LTD. All rights reserved.
 * 
 * Licensed under the Open Software License version 3.0
 * See LICENSE.txt and COPYING.txt for license details.
 */

namespace Cowell\AbandonedCart\Model\ResourceModel\QuoteAlertStatus;

/**
 * Class Collection
 * @package Aeonibs\Catalog\Model\ResourceModel\Affix
 */
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            'Cowell\AbandonedCart\Model\QuoteAlertStatus',
            'Cowell\AbandonedCart\Model\ResourceModel\QuoteAlertStatus'
        );
    }
}
