<?php
/**
 * Created by PhpStorm.
 * User: Mikhail
 * Date: 08.12.2019
 * Time: 17:11
 */

namespace App\Filters\Vacancy;


use App\Filters\Filter;
use Zend\Validator\Db\RecordExists;
use Zend\Validator\StringLength;

class VacancyCreateFilter extends Filter
{
    /**
     *  int $company_id,
     * int $user_id,
     * string $name,
     * string $description,
     */
    public function init()
    {
        $this->add([
            'name' => 'company_id',
            'required' => true,
            'validators' => [
                [
                    'name' => RecordExists::class,
                    'options' => [
                        'table' => 'companies',
                        'field' => 'id',
                        'adapter' => $this->adapter,
                    ]
                ]
            ]
        ]);

        $this->add([
            'name' => 'user_id',
            'required' => true,
            'validators' => [
                [
                    'name' => RecordExists::class,
                    'options' => [
                        'table' => 'users',
                        'field' => 'id',
                        'adapter' => $this->adapter,
                    ]
                ]
            ]
        ]);

        $this->add([
            'name' => 'name',
            'required' => true,
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'min' => 5,
                        'max' => 60
                    ],
                ]
            ]
        ]);

        $this->add([
            'name' => 'description',
            'required' => false,
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'min' => 5,
                        'max' => 300
                    ],
                ]
            ]
        ]);
    }
}