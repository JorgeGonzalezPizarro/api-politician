<?php
/**
 * Created by PhpStorm.
 * User: JorgePc
 * Date: 27/01/2019
 * Time: 19:42
 */

namespace App\Politicians\Infrastructure\Exceptions\Manager;

use App\Politicians\Domain\Exceptions\DomainException;
use Symfony\Component\Debug\Exception\FatalThrowableError;
use Symfony\Component\Debug\Exception\UndefinedMethodException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
class ExceptionManager
{
    const HTTP_CODE = "http_code";
    const CODE_RESPONSE = "code_response";
    const DEFAULT_CODE_RESPONSE= 0;
    const HTTP_BAD_REQUEST= 400;
    const CODE_RESPONSE_BAD_REQUEST= 170040;

    private $exceptionsCodeResponses = [

        FatalThrowableError::class => [
            self::HTTP_CODE => Response::HTTP_BAD_REQUEST ,
            self::CODE_RESPONSE => 0
        ],
        UndefinedMethodException::class => [
            self::HTTP_CODE => 0 ,
            self::CODE_RESPONSE => Response::HTTP_INTERNAL_SERVER_ERROR
        ] ,
        BadRequestHttpException::class => [
            self::HTTP_CODE => Response::HTTP_BAD_REQUEST,
            self::CODE_RESPONSE => 170040
        ]
    ];





    public function registerException($exceptionInstance)
    {
        if (!is_array($exceptionInstance)) {
            if ($exceptionInstance instanceof DomainException) {
                $this->exceptionsCodeResponses[get_class($exceptionInstance)][self::HTTP_CODE] = $exceptionInstance->getHttpException();
                $this->exceptionsCodeResponses[get_class($exceptionInstance)][self::CODE_RESPONSE] = $exceptionInstance->getCodeResponse();

                return;
            }

        }
        foreach ($exceptionInstance as $exceptionClass => $exceptionHttpCode) {
            $this->exceptionsCodeResponses[$exceptionClass]=$exceptionHttpCode;
        }
    }

    public function existsException($exceptionInstance)
    {
        return array_key_exists($exceptionInstance, $this->exceptionsCodeResponses);
    }
    public function getHttpCode($exceptionInstance)
    {

        return $this->exceptionsCodeResponses[$exceptionInstance][self::HTTP_CODE];
    }

    public function getCodeResponse($exceptionInstance)
    {
        return $this->exceptionsCodeResponses[$exceptionInstance][self::CODE_RESPONSE];
    }
}