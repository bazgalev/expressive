<?php

declare(strict_types=1);

namespace Database;

use ArrayObject;
use Database\Entities\Company;
use Database\Entities\User;
use Database\Entities\Vacancy;
use Database\Gateways\CompaniesGateway;
use Database\Gateways\UsersGateway;
use Database\Gateways\VacanciesGateway;
use Interop\Container\ContainerInterface;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Adapter\AdapterServiceFactory;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

/**
 * The configuration provider for the Database module
 *
 * @see https://docs.zendframework.com/zend-component-installer/
 */
class ConfigProvider
{
    /**
     * Returns the configuration array
     *
     * To add a bit of a structure, each section is defined in a separate
     * method which returns an array with its configuration.
     */
    public function __invoke(): array
    {
        return [
            'dependencies' => $this->getDependencies(),
            'templates' => $this->getTemplates(),

            'db' => [
                'driver' => 'Pdo_Mysql',
                'database' => 'expressive',
                'username' => 'root',
                'password' => 'root',
                'hostname' => 'localhost',
                'port' => 3306,
                'charset' => 'utf8'
            ],
        ];
    }

    /**
     * Returns the container dependencies
     */
    public function getDependencies(): array
    {
        return [
            'invokables' => [
            ],
            'factories' => [
                Adapter::class => AdapterServiceFactory::class,

                UsersGateway::class => function (ContainerInterface $container) {
                    return $this->getGatewayInstance($container, new User(), UsersGateway::class);
                },
                VacanciesGateway::class => function (ContainerInterface $container) {
                    return $this->getGatewayInstance($container, new Vacancy(), VacanciesGateway::class);
                },
                CompaniesGateway::class => function (ContainerInterface $container) {
                    return $this->getGatewayInstance($container, new Company(), CompaniesGateway::class);
                }
            ],
        ];
    }

    /**
     * Returns the templates configuration
     */
    public function getTemplates(): array
    {
        return [
            'paths' => [
                'database' => [__DIR__ . '/../templates/'],
            ],
        ];
    }

    private function getGatewayInstance(
        ContainerInterface $container,
        ArrayObject $arrayObjectPrototype,
        string $gateway): TableGateway
    {
        $adapter = $container->get(Adapter::class);

        $set = new ResultSet();
        $set->setArrayObjectPrototype($arrayObjectPrototype);

        return new $gateway($adapter, null, $set);
    }
}
