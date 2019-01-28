<?php
/**
 * Created by PhpStorm.
 * User: JorgePc
 * Date: 27/01/2019
 * Time: 19:23
 */

namespace App\Politicians\Domain\Exceptions;


abstract class DomainException extends \Exception
{
    protected  const HTTP_ERROR= null;
    protected  const MESSAGE= null;
    abstract public function httpCode():int;


    public function __construct(string $message , int $httpCode)
    {
        $this->message=$message;
        $this->httpCode =$httpCode;
    }
}