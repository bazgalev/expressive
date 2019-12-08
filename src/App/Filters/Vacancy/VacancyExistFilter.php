<?php
/**
 * Created by PhpStorm.
 * User: Mikhail
 * Date: 08.12.2019
 * Time: 20:52
 */

namespace App\Filters\Vacancy;


use App\Filters\Filter;
use Zend\Validator\Db\RecordExists;

class VacancyExistFilter extends Filter
{
    public function init()
    {
        $this->add([
            'name' => 'id',
            'required' => true,
            'validators' => [
                [
                    'name' => RecordExists::class,
                    'options' => [
                        'table' => 'vacancies',
                        'field' => 'id',
                        'adapter' => $this->adapter,
                    ]
                ]
            ]
        ]);
    }
}