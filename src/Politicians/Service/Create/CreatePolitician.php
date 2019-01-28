<?php
/**
 * Created by PhpStorm.
 * User: JorgePc
 * Date: 27/01/2019
 * Time: 19:22
 */

namespace App\Politicians\Service\Create;


use App\Politicians\Domain\Exceptions\PoliticianAlreadyExists;
use App\Politicians\Domain\Politicians;
use App\Politicians\Domain\PoliticiansRepository;
use Doctrine\ODM\MongoDB\Id\UuidGenerator;

class CreatePolitician
{

    public function __construct(PoliticiansRepository $politiciansRepository , \App\Politicians\Domain\UUidGenerator $uuidGenerator)
    {
        $this->politicianRepository = $politiciansRepository;
        $this->uuidGenerator = $uuidGenerator;
    }

    public function handle(CreatePoliticianDto $dto)
    {
        $politician = $this->politicianRepository->exists($dto->getId());
        if ($politician) {
            throw new PoliticianAlreadyExists();
        }
       $this->politicianRepository->save( Politicians::create(
            $dto->getTitular(),
            $dto->getPartido(),
            $dto->getPartidoFiltro(),
            $dto->getGenero(),
            $dto->getCargo(),
            $dto->getCargoFiltro(),
            $dto->getInstitucion(),
            $dto->getCcaa(),
            $dto->getSueldoBase(),
            $dto->getComplementoSueldo(),
            $dto->getPagasExtra(),
            $dto->getDietas(),
            $dto->getTrienios(),
            $dto->getRetAnual(),
            $dto->getRetMesual(),
            $dto->getObservaciones()
        )
    );
    }
}