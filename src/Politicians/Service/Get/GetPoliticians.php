<?php
/**
 * Created by PhpStorm.
 * User: JorgePc
 * Date: 27/01/2019
 * Time: 17:40
 */

namespace App\Politicians\Service\Get;

use App\Politicians\Domain\PoliticiansRepository;
use App\Politicians\Service\DTO\DtoInterface;
use App\Politicians\Service\Get\PaginationService\PaginationService;
use App\Politicians\Service\Transformer\Transformer;

class GetPoliticians
{
    const LIMITED_LIST= 50;
    private $politiciansRepository;
    private $paginationService;
    private $politiciansTransformer;

    public function __construct(
        PoliticiansRepository $politiciansRepository,
        PaginationService $paginationService,
        Transformer $transformer
    ) {
        $this->politiciansRepository = $politiciansRepository;
        $this->paginationService = $paginationService;
        $this->politiciansTransformer = $transformer;
    }

    public function handle(GetPoliticiansDto $dto)
    {
        $politicians = $this->politiciansRepository->findLimited(self::LIMITED_LIST);
        if ($dto->getPage() !== null) {

            $pagination = $this->paginationService->__invoke($dto->getPage(), $politicians->count());
            return  $this->responseWithPagination($this->politiciansTransformer->transformCollectionAggregeteRootToResponse(
                $this->politiciansRepository->findPaginated($pagination->firstItemPage(),
                    $pagination->getItemsPerPage(), self::LIMITED_LIST)),
                $this->paginationService->response($pagination)
                );
        }

       return $this->response($this->politiciansTransformer->transformCollectionAggregeteRootToResponse($politicians));
    }

    private function responseWithPagination( $politicians ,  $pagination)
    {
            return json_encode(array_merge($politicians,$pagination),true);
    }
    private function response( $politicians)
    {
        return json_encode($politicians,true);
    }
}