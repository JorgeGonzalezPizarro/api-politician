<?php
/**
 * Created by PhpStorm.
 * User: JorgePc
 * Date: 27/01/2019
 * Time: 19:14
 */

namespace App\Politicians\Api;


use App\Politicians\Infrastructure\Api\CommandController;
use App\Politicians\Service\Create\CreatePoliticianDto;
use Symfony\Component\HttpFoundation\Response;

class CreatePolitician extends CommandController
{
    public function __invoke()
    {
        $data = $this->getRequestParams();
        return new Response(
            $this->commandBus->handle(
                new CreatePoliticianDto(
                    $data->get('id'),
                    $data->get('titular'),
                    $data->get('partido'),
                    $data->get('partidoFiltro'),
                    $data->get('genero'),
                    $data->get('cargoFiltro'),
                    $data->get('cargo'),
                    $data->get('institucion'),
                    $data->get('ccaa'),
                    $data->get('sueldoBase'),
                    $data->get('complementoSueldo'),
                    $data->get('pagasExtra'),
                    $data->get('dietas'),
                    $data->get('trienios'),
                    $data->get('retMensual'),
                    $data->get('retAnual'),
                    $data->get('observaciones')
                )
            ),
            self::HTTP_CODES["CREATED"]
        );
    }

}