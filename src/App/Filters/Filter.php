<?php
/**
 * Created by PhpStorm.
 * User: Mikhail
 * Date: 08.12.2019
 * Time: 21:51
 */

namespace App\Filters;


use Zend\Db\Adapter\Adapter;
use Zend\InputFilter\InputFilter;

class Filter extends InputFilter
{
    protected $adapter;

    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
        $this->init();
    }
}