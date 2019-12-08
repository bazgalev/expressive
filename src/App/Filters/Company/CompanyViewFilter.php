<?php
/**
 * Created by PhpStorm.
 * User: Mikhail
 * Date: 08.12.2019
 * Time: 21:50
 */

namespace App\Filters\Company;


use App\Filters\Filter;
use Zend\Validator\Db\RecordExists;

class CompanyViewFilter extends Filter
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
                        'table' => 'companies',
                        'field' => 'id',
                        'adapter' => $this->adapter,
                    ]
                ]
            ]
        ]);
    }
}