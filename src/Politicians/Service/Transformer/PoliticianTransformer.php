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
        return ["politicians" => $collectionAggregateRoot->map(function ($aggregateRoot)
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

        })->toArray(),
            "form" => [
                "titular" => ["required" => true , "type" => "string" , "label"=>"Titular" ],
                "partido" => ["required" => true , "type" => "string" , "label"=>"Partido" ],
                "partidoParaFiltro" => ["required" => false , "type" => "string" , "label"=>"Part. filtro" ],
                "genero" => ["required" => true , "type" => "string" , "label"=>"Genero" ],
                "cargo" => ["required" => true , "type" => "string" , "label"=>"Genero" ],
                "cargoParaFiltro" => ["required" => false , "type" => "string" , "label"=>"C. para filtro" ],
                "institucion" => ["required" => true , "type" => "string" , "label"=>"Institución" ],
                "ccaa" => ["required" => true , "type" => "string" , "label"=>"Comunidad Autónoma" ],
                "sueldoBase" => ["required" => true , "type" => "number" , "label"=>"Sueldo base" ],
                "pagasExtrasSueldo" => ["required" => false , "type" => "number" , "label"=>"P.E. Sueldo" ],
                "otrasDietas" => ["required" => false , "type" => "number" , "label"=>"Otras dietas" ],
                "trieniosSueldo" => ["required" => true , "type" => "number" , "label"=>"Trienios" ],
                "retribucionAnual" => ["required" => true , "type" => "number" , "label"=>"Retr. Anual" ],
                "retribucionMensual" => ["required" => true , "type" => "number" , "label"=>"Retr. Mensual" ],
                "observaciones" => ["required" => false , "type" => "string" , "label"=>"Observaciones " ],
            ]
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