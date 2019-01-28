<?php
/**
 * Created by PhpStorm.
 * User: JorgePc
 * Date: 27/01/2019
 * Time: 17:32
 */

namespace App\Politicians\Infrastructure\Api;
use App\Politicians\Service\DTO\DtoInterface;
use League\Tactician\CommandBus;
use Symfony\Component\HttpFoundation\RequestStack;

abstract class MainController
{
    protected $request;
    protected $commandBus;

    protected const HTTP_CODES = [
        "CREATED" => 201,
        "OK" => 200
    ];

    public function __construct(RequestStack $requestStack,
        CommandBus $commandBus
      )
    {
        $this->commandBus=$commandBus;
        $this->request=$requestStack->getMasterRequest();
//        $this->exceptionHandler=$exceptionHandler;
//        $this->validator=$validator;
       // $this->exceptionHandler->registerException($this->exceptions());
//        $this->jwtService=$jwt;
    }

    public function dispatch($dto)
    {
        return $this->commandBus->handle($dto);
    }



}
