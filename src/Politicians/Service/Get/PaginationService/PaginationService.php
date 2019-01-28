<?php
/**
 * Created by PhpStorm.
 * User: JorgePc
 * Date: 28/01/2019
 * Time: 11:11
 */

namespace App\Politicians\Service\Get\PaginationService;


use App\Politicians\Domain\Pagination\Pagination;
use App\Politicians\Domain\PoliticiansRepository;
use App\Politicians\Infrastructure\AggregateRoot;
use App\Politicians\Service\Transformer\Transformer;

class PaginationService
{
    private $politiciansRepository;
    private $paginationTransformer;
    public function __construct(PoliticiansRepository $politiciansRepository , Transformer $paginationTransformer )
    {
        $this->paginationTransformer = $paginationTransformer;
        $this->politiciansRepository=$politiciansRepository;
    }

    public function __invoke(string $page , int $totalItems)
    {
      return Pagination::create(
            $page, $totalItems
        );
    }
    public function response(AggregateRoot $aggregateRoot)
    {
        return $this->paginationTransformer->transformAggregeteRootToResponse($aggregateRoot);
    }
}