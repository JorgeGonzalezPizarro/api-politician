<?php
/**
 * Created by PhpStorm.
 * User: JorgePc
 * Date: 27/01/2019
 * Time: 19:42
 */

namespace App\Politicians\Infrastructure\Exceptions\Listener;

use App\Politicians\Domain\Exceptions\DomainException;
use App\Politicians\Infrastructure\Exceptions\ApiException;
use App\Politicians\Infrastructure\Exceptions\Manager\ExceptionManager;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class ExceptionListener implements EventSubscriberInterface
{

    private $exceptionManager;
    private const PRIORITY = 10;
    private const HTTP_CODE_ERROR = 500;

    public function __construct(ExceptionManager $exceptionHandler)
    {
        $this->exceptionManager = $exceptionHandler;
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::EXCEPTION => [
                'onKernelException',
                self::PRIORITY
            ]
        ];
    }

    public function onKernelException(GetResponseForExceptionEvent $event)
    {

       $exception = $event->getException();
        if (!$event->getException() instanceof DomainException) {
            throw new ApiException($exception->getMessage());
        }
        $event->setResponse(
            $this->createResponseForDomainException($exception));
    }

    public function createResponseForDomainException(\Exception $exception): Response
    {

        return new Response($exception->getMessage(), $this->getCodeForException($exception), []);
    }
    private function getCodeForException(\Exception $exception)
    {
        if($exception instanceof DomainException)
        {
            return $exception->httpCode();
        }
        return self::HTTP_CODE_ERROR;
    }
}