<?php

declare(strict_types=1);

namespace App\Handler;

use Database\Entities\User;
use Database\Entities\UserRow;
use Database\Gateways\UsersGateway;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\RowGateway\RowGateway;
use Zend\Db\TableGateway\Feature\RowGatewayFeature;
use Zend\Db\TableGateway\TableGateway;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Expressive\Router;

class HomePageHandler implements RequestHandlerInterface
{
    /** @var string */
    private $containerName;

    /** @var Router\RouterInterface */
    private $router;

    /** @var UsersGateway */
    private $gateway;

    public function __construct(
        string $containerName,
        Router\RouterInterface $router,
        UsersGateway $gateway
    )
    {
        $this->containerName = $containerName;
        $this->router = $router;
        $this->gateway = $gateway;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $rows = $this->gateway->select();

        $response = [];
        /** @var User $row */
        foreach ($rows as $row) {
            $response[] = $row->toArray();
        }

        return new JsonResponse($response);
    }
}
