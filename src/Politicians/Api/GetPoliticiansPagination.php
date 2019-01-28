<?php
/**
 * Created by PhpStorm.
 * User: JorgePc
 * Date: 27/01/2019
 * Time: 17:30
 */

namespace App\Politicians\Api;

use App\Politicians\Infrastructure\Api\CommandController;
use App\Politicians\Infrastructure\Api\MainController;
use App\Politicians\Infrastructure\Api\QueryController;
use App\Politicians\Service\Get\GetPoliticiansDto;
use Symfony\Component\HttpFoundation\Response;

class GetPoliticiansPagination extends QueryController
{

    public function __invoke()
    {
        $data = $this->getRequestParams();
        return new Response(
            $this->commandBus->handle(
                new GetPoliticiansDto(
                $data->get('page')
                )
            ), self::HTTP_CODES['OK']
        );
    }
}