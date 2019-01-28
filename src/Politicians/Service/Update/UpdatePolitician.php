<?php
/**
 * Created by PhpStorm.
 * User: JorgePc
 * Date: 27/01/2019
 * Time: 19:22
 */

namespace App\Politicians\Service\Update;


use App\Politicians\Domain\Exceptions\PoliticianAlreadyExists;
use App\Politicians\Domain\Exceptions\PoliticianNotExists;
use App\Politicians\Domain\Politicians;
use App\Politicians\Domain\PoliticiansRepository;
use Doctrine\ODM\MongoDB\Id\UuidGenerator;

class UpdatePolitician
{

    public function __construct(PoliticiansRepository $politiciansRepository )
    {
        $this->politicianRepository = $politiciansRepository;
    }

    public function handle(UpdatePoliticianDto $dto)
    {
        $politician = $this->politicianRepository->exists($dto->getId());
        if (!$politician) {
            throw new PoliticianAlreadyExists();
        }
       $this->politicianRepository->update($politician->update(
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