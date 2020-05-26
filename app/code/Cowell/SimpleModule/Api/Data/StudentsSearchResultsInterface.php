<?php declare(strict_types=1);


namespace Cowell\SimpleModule\Api\Data;


interface StudentsSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get students list.
     * @return \Cowell\SimpleModule\Api\Data\StudentsInterface[]
     */
    public function getItems();

    /**
     * Set name list.
     * @param \Cowell\SimpleModule\Api\Data\StudentsInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

