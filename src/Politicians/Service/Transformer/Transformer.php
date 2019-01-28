<?php
/**
 * Created by PhpStorm.
 * User: JorgePc
 * Date: 28/01/2019
 * Time: 11:52
 */

namespace App\Politicians\Service\Transformer;


use App\Politicians\Infrastructure\AggregateRoot;
use App\Politicians\Infrastructure\DomainCollection;

interface Transformer
{

    public function transformAggregeteRootToResponse(AggregateRoot $aggregateRoot)  ;
    public function transformCollectionAggregeteRootToResponse(DomainCollection $aggregateRoot)  ;
}