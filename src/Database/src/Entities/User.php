<?php
/**
 * Created by PhpStorm.
 * User: Mikhail
 * Date: 08.12.2019
 * Time: 0:41
 */

namespace Database\Entities;


class User extends \ArrayObject
{
    public $id;
    public $email;
    public $name;
    public $surname;

    public function exchangeArray($data)
    {
        $this->id = $data['id'] ?? null;
        $this->email = $data['email'] ?? null;
        $this->name = $data['name'] ?? null;
        $this->surname = $data['surname'] ?? null;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'name' => $this->name,
            'surname' => $this->surname
        ];
    }
}