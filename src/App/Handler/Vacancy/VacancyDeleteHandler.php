<?php

declare(strict_types=1);

namespace App\Handler\Vacancy;

use Database\Gateways\VacanciesGateway;
use Exception;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\JsonResponse;

class VacancyDeleteHandler implements RequestHandlerInterface
{
    protected $gateway;

    public function __construct(VacanciesGateway $gateway)
    {
        $this->gateway = $gateway;
    }

    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     * @throws Exception
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $id = (int)$request->getAttribute('id');

        $this->gateway->delete(['id = ?' => $id]);

        return new JsonResponse($id, 204);
    }
}
