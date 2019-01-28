<?php
/**
 * Created by PhpStorm.
 * User: JorgePc
 * Date: 27/01/2019
 * Time: 19:24
 */

namespace App\Politicians\Domain\Exceptions;


class PoliticianNotExists extends DomainException
{

    protected const HTTP_ERROR = 400;
    protected const MESSAGE = 'Politician not exists';
    public function httpCode(): int
    {
        return self::HTTP_ERROR;
    }
    public function __construct()
    {
        parent::__construct(self::MESSAGE, self::HTTP_ERROR);
    }


}