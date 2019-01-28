<?php
/**
 * Created by PhpStorm.
 * User: JorgePc
 * Date: 28/01/2019
 * Time: 14:36
 */

namespace App\Politicians\Infrastructure\Persisntance;


use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ORM\Id\UuidGenerator;
use MongoDB\BSON\ObjectId;

class MongoIdGenerator extends \Doctrine\ODM\MongoDB\Id\UuidGenerator implements \App\Politicians\Domain\UUidGenerator
{
    public function __construct(DocumentManager $documentManager)
    {
        $this->documentManager = $documentManager;
    }

    public function generateUUid(string $class)
    {
        return (int)($this->generate($this->documentManager,$class));
    }

}