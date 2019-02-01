<?php
/**
 * Created by PhpStorm.
 * User: JorgePc
 * Date: 27/01/2019
 * Time: 18:09
 */

namespace App\Politicians\Domain;


use App\Politicians\Infrastructure\AggregateRoot;
use App\Politicians\Infrastructure\DomainCollection;

interface PoliticiansRepository
{
    public function findAll() : DomainCollection;
    public function exists(string $id);
    public function save(AggregateRoot $aggregateRoot);
    public function update(AggregateRoot $aggregateRoot);
    public function findPaginated(int $limitMin, int $limitMax , int $numRecords);
    public function findLimited(int $limit);

}