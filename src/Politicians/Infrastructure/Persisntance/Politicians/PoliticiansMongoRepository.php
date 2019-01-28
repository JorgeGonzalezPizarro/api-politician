<?php
/**
 * Created by PhpStorm.
 * User: JorgePc
 * Date: 27/01/2019
 * Time: 18:10
 */

namespace App\Politicians\Infrastructure\Persisntance\Politicians;


use App\Politicians\Domain\Exceptions\PoliticianNotExists;
use App\Politicians\Domain\Politicians;
use App\Politicians\Domain\PoliticiansRepository;
use App\Politicians\Infrastructure\AggregateRoot;
use App\Politicians\Infrastructure\DomainCollection;
use Doctrine\ODM\MongoDB\DocumentManager;
use MongoDB\BSON\ObjectId;
use MongoDB\Operation\Aggregate;
use MongoDB\Driver\Manager;

class PoliticiansMongoRepository implements PoliticiansRepository
{
    private $documentManager;
    private $queryCreator;

    public function __construct(DocumentManager $documentManager)
    {
        $this->documentManager = $documentManager->getRepository(Politicians::class);
        $this->queryCreator = $documentManager;
    }

    public function findPaginated(int $limitMin, int $limitMax , int  $numRecords )
    {
        return DomainCollection::fromArray($this->queryCreator->createQueryBuilder(Politicians::class)->eagerCursor(true)->getQuery()->execute()->skip($limitMin)->limit($limitMax)->toArray());
    }

    public function findLimited(int $limit): DomainCollection
    {
        $numRowsPoliticians = $this->findAll()->count();
        return DomainCollection::fromArray($this->queryCreator->createQueryBuilder(Politicians::class)->eagerCursor(true)->getQuery()->execute()->skip($numRowsPoliticians-$limit)->limit($limit)->toArray());

    }

    public function findAll(): DomainCollection
    {
        return DomainCollection::fromArray($this->documentManager->findAll());

    }

    public function exists(string $id)
    {
        try{
            return  $this->documentManager->findOneBy(["id" => new \MongoId($id)]);

        }
        catch (\Exception $exception)
        {
            throw new PoliticianNotExists();
        }
    }

    public function update(AggregateRoot $aggregateRoot)
    {
        $this->queryCreator->persist($aggregateRoot);
        $this->queryCreator->flush($aggregateRoot);
    }

    public function save(AggregateRoot $aggregateRoot)
    {
        $this->queryCreator->persist($aggregateRoot);
        $this->queryCreator->flush($aggregateRoot);

    }
}