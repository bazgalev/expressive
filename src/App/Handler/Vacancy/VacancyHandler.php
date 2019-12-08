<?php
/**
 * Created by PhpStorm.
 * User: Mikhail
 * Date: 08.12.2019
 * Time: 22:13
 */

namespace App\Handler\Vacancy;


use Database\Gateways\VacanciesGateway;
use Psr\Http\Server\RequestHandlerInterface;

abstract class VacancyHandler implements RequestHandlerInterface
{
    protected $vacanciesGateway;

    public function __construct(VacanciesGateway $vacanciesGateway)
    {
        $this->vacanciesGateway = $vacanciesGateway;
    }
}