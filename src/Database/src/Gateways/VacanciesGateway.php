<?php
/**
 * Created by PhpStorm.
 * User: Mikhail
 * Date: 08.12.2019
 * Time: 10:21
 */

namespace Database\Gateways;


use Database\Entities\Vacancy;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSetInterface;
use Zend\Db\Sql\Sql;
use Zend\Db\TableGateway\TableGateway;

class VacanciesGateway extends TableGateway
{
    public function __construct(AdapterInterface $adapter, $features = null, ?ResultSetInterface $resultSetPrototype = null, ?Sql $sql = null)
    {
        parent::__construct('vacancies', $adapter, $features, $resultSetPrototype, $sql);
    }

    /**
     * @return Vacancy[]
     */
    public function getAll(): array
    {
        $rows = $this->select();

        $data = [];
        /** @var Vacancy $row */
        foreach ($rows as $row) {
            $data[] = $row->toArray();
        }
        return $data;
    }

    /**
     * @param int $vacancyId
     * @return mixed
     */
    public function getInfo(int $vacancyId)
    {
        $sql = new Sql($this->getAdapter());
        $select = $sql->select();
        $select->from('vacancies');
        $select->where(['vacancies.id=?' => $vacancyId]);
        $select->columns([
            'vacancy_id' => 'id',
            'vacancy_name' => 'name',
            'vacancy_description' => 'description',
            'vacancy_created_at' => 'created_at',
            'vacancy_updated_at' => 'updated_at',
        ]);

        $select->join(
            'companies',
            'vacancies.company_id = companies.id',
            [
                'company_id' => 'id',
                'company_name' => 'name',
                'company_description' => 'description'
            ], $select::JOIN_LEFT
        );

        $select->join('users',
            'vacancies.user_id',
            [
                'user_id' => 'id',
                'user_name' => 'name',
                'user_surname' => 'surname'
            ], $select::JOIN_LEFT);

        $stmt = $sql->prepareStatementForSqlObject($select);
        $result = $stmt->execute();

        return $result->current();
    }
}