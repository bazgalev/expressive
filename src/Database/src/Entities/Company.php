<?php
/**
 * Created by PhpStorm.
 * User: Mikhail
 * Date: 08.12.2019
 * Time: 10:16
 */

namespace Database\Entities;


class Company extends \ArrayObject
{
    public $id;
    public $name;
    public $description;

    public function exchangeArray($input)
    {
        $this->id = $input['id'] ?? null;
        $this->name = $input['name'] ?? null;
        $this->description = $input['description'] ?? null;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->name
        ];
    }
}