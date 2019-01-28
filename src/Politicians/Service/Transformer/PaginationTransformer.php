<?php
/**
 * Created by PhpStorm.
 * User: JorgePc
 * Date: 28/01/2019
 * Time: 11:53
 */

namespace App\Politicians\Service\Transformer;


use App\Politicians\Domain\Pagination\Pagination;
use App\Politicians\Infrastructure\AggregateRoot;
use App\Politicians\Infrastructure\DomainCollection;

class PaginationTransformer implements Transformer
{
    public function transformAggregeteRootToResponse(AggregateRoot $pagination)
    {
        /**
         * @var $pagination Pagination
         */
        return [
            "meta" => [
                "page" => $pagination->getPage(),
                "itemsPerPage"=>$pagination->getItemsPerPage(),
                "totalPages" => $pagination->getTotalPages(),
                "totalItems" => $pagination->getTotalItems()
            ]
        ];
    }


    public function transformCollectionAggregeteRootToResponse(DomainCollection $aggregateRoot)
    {
        return "" ;
    }
}