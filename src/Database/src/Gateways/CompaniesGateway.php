<?php
/**
 * Created by PhpStorm.
 * User: Mikhail
 * Date: 08.12.2019
 * Time: 10:21
 */

namespace Database\Gateways;


use Database\Entities\Company;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\ResultSet\ResultSetInterface;
use Zend\Db\Sql\Sql;
use Zend\Db\TableGateway\TableGateway;

class CompaniesGateway extends TableGateway
{
    public function __construct(AdapterInterface $adapter, $features = null, ?ResultSetInterface $resultSetPrototype = null, ?Sql $sql = null)
    {
        parent::__construct('companies', $adapter, $features, $resultSetPrototype, $sql);
    }

    public function getById(int $companyId): ?Company
    {
        /** @var ResultSet $rowSet */
        $rowSet = $this->select(['id = ?' => $companyId]);

        return $rowSet->current();
    }
}