<?php
/**
 * Created by PhpStorm.
 * User: JorgePc
 * Date: 27/01/2019
 * Time: 19:52
 */

namespace App\Politicians\Infrastructure\Exceptions;


use Throwable;

class ApiException extends \Exception
{
    const HTTP_CODE= 500;
   public function __construct(string $message = "", int $code = 0, Throwable $previous = null)
   {
       parent::__construct($message, self::HTTP_CODE, $previous);
   }
}