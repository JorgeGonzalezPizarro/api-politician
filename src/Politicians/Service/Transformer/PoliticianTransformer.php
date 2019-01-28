<?php
/**
 * Created by PhpStorm.
 * User: JorgePc
 * Date: 28/01/2019
 * Time: 11:57
 */

namespace App\Politicians\Service\Transformer;


use App\Politicians\Domain\Politicians;
use App\Politicians\Infrastructure\AggregateRoot;
use App\Politicians\Infrastructure\DomainCollection;

class PoliticianTransformer implements Transformer
{
    public function transformCollectionAggregeteRootToResponse(DomainCollection $collectionAggregateRoot)
    {
        return ["Politicians" => $collectionAggregateRoot->map(function ($aggregateRoot)
        {
            /**
             * @var $aggregateRoot Politicians
             */
             return ["id" => $aggregateRoot->getId(),
                "titular" => $aggregateRoot->getTitular(),
                "partido" => $aggregateRoot->getPartido(),
                "partidoParaFiltro" => $aggregateRoot->getPartidoParaFiltro(),
                "genero" => $aggregateRoot->getGenero(),
                "cargo" => $aggregateRoot->getCargo(),
                "cargoParaFiltro" => $aggregateRoot->getCargoParaFiltro(),
                "institucion" => $aggregateRoot->getInstitucion(),
                "ccaa" => $aggregateRoot->getCcaa(),
                "sueldoBase" => $aggregateRoot->getSueldoBase(),
                "complementosSueldo" => $aggregateRoot->getComplementosSueldo(),
                "pagasExtrasSueldo" => $aggregateRoot->getPagasExtrasSueldo(),
                "otrasDietas" => $aggregateRoot->getOtrasDietasIndemnizac(),
                "trieniosSueldo" => $aggregateRoot->getTrieniosSueldo(),
                "retribucionAnual" => $aggregateRoot->getRetribucionAnual(),
                "retribucionMensual" => $aggregateRoot->getRetribucionMensual(),
                "observaciones" => $aggregateRoot->getObservaciones()
            ];

        })->toArray()
        ];
    }

    public function transformAggregeteRootToResponse(AggregateRoot $aggregateRoot)
    {
        return   ["id" => $aggregateRoot->getId(),
            "titular" => $aggregateRoot->getTitular(),
            "partido" => $aggregateRoot->getPartido(),
            "partidoParaFiltro" => $aggregateRoot->getPartidoParaFiltro(),
            "genero" => $aggregateRoot->getGenero(),
            "cargo" => $aggregateRoot->getCargo(),
            "cargoParaFiltro" => $aggregateRoot->getCargoParaFiltro(),
            "institucion" => $aggregateRoot->getInstitucion(),
            "ccaa" => $aggregateRoot->getCcaa(),
            "sueldoBase" => $aggregateRoot->getSueldoBase(),
            "complementosSueldo" => $aggregateRoot->getComplementosSueldo(),
            "pagasExtrasSueldo" => $aggregateRoot->getPagasExtrasSueldo(),
            "otrasDietas" => $aggregateRoot->getOtrasDietasIndemnizac(),
            "trieniosSueldo" => $aggregateRoot->getTrieniosSueldo(),
            "retribucionAnual" => $aggregateRoot->getRetribucionAnual(),
            "retribucionMensual" => $aggregateRoot->getRetribucionMensual(),
            "observaciones" => $aggregateRoot->getObservaciones()
        ];
    }
}