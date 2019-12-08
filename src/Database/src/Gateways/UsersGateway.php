<?php
/**
 * Created by PhpStorm.
 * User: Mikhail
 * Date: 08.12.2019
 * Time: 0:37
 */

namespace Database\Gateways;


use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSetInterface;
use Zend\Db\Sql\Sql;
use Zend\Db\TableGateway\TableGateway;

class UsersGateway extends TableGateway
{
    public function __construct(AdapterInterface $adapter, $features = null, ?ResultSetInterface $resultSetPrototype = null, ?Sql $sql = null)
    {
        parent::__construct('users', $adapter, $features, $resultSetPrototype, $sql);
    }
}