<?php
/**
 * Created by PhpStorm.
 * User: JorgePc
 * Date: 28/01/2019
 * Time: 11:13
 */

namespace App\Politicians\Domain\Pagination;


use App\Politicians\Infrastructure\AggregateRoot;

class Pagination implements AggregateRoot
{
    private $page;
    private $totalPages;
    private $itemsPerPage;
    private $totalItems;
    private $firsItemPage;
    private $lastItemPage;
    const DEFAULT_ITEMS_PER_PAGE = 10;

    public function __construct(int $page , int $totalItems)
    {
        $this->page=$page;
        $this->totalItems=$totalItems;
        $this->totalPages=$this->calculateTotalPages($totalItems);
        $this->itemsPerPage=$this->obtainItemsPerPage();
        $this->firsItemPage = $this->calculateFirstItem($this->itemsPerPage);
        $this->lastItemPage = $this->calculateLastItem($page,$this->itemsPerPage);
    }

    /**
     * @return int
     */
    public function getPage(): int
    {
        return $this->page;
    }

    /**
     * @return float|int
     */
    public function getTotalPages()
    {
        return $this->totalPages;
    }

    /**
     * @return int
     */
    public function getItemsPerPage(): int
    {
        return $this->itemsPerPage;
    }

    /**
     * @return int
     */
    public function getTotalItems(): int
    {
        return $this->totalItems;
    }

    public function firstItemPage()
    {
        return $this->firsItemPage;
    }
    public function lastItemPage()
    {
        return $this->lastItemPage;
    }


    private function calculateTotalPages( $totalItems)
    {
        return $totalItems===0 ? 0 :  round($totalItems /$this->obtainItemsPerPage());
    }

    private function calculateLastItem(int $page , int $itemsPerPage)
    {
        return ($page*$itemsPerPage) -1;
    }

    private function calculateFirstItem(int $itemsPerPage)
    {
        return ($this->page*$this->itemsPerPage) -$this->itemsPerPage;
    }
    private function obtainItemsPerPage()
    {
        return self::DEFAULT_ITEMS_PER_PAGE;
    }

    public static function create(string $page ,  $totalItems)
    {
        return new self((int) $page,(int)$totalItems);
    }

}