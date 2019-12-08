<?php
/**
 * Created by PhpStorm.
 * User: Mikhail
 * Date: 08.12.2019
 * Time: 10:17
 */

namespace Database\Entities;


use Database\Gateways\VacanciesGateway;

class Vacancy extends \ArrayObject
{
    public $id;
    public $company_id;
    public $user_id;
    public $name;
    public $description;
    public $created_at;
    public $updated_at;


    public function exchangeArray($input)
    {
        $this->id = $input['id'] ?? null;
        $this->company_id = $input['company_id'] ?? null;
        $this->user_id = $input['user_id'] ?? null;
        $this->name = $input['name'] ?? null;
        $this->description = $input['description'] ?? null;
        $this->created_at = $input['created_at'] ?? null;
        $this->updated_at = $input['updated_at'] ?? null;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'company_id' => $this->company_id,
            'user_id' => $this->user_id,
            'name' => $this->name,
            'description' => $this->description,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }

    public static function create(
        int $company_id,
        int $user_id,
        string $name,
        string $description,
        VacanciesGateway $gateway
    ): Vacancy
    {
        $set = new Vacancy();
        $set->company_id = $company_id;
        $set->user_id = $user_id;
        $set->name = $name;
        $set->description = $description;
        $set->created_at = date('Y-m-d H:i:s');
        $set->updated_at = null;

        $gateway->insert($set->toArray());
        $set->id = (int)$gateway->getLastInsertValue();

        return $set;
    }

    public function update(array $body, VacanciesGateway $gateway)
    {
        $this->company_id = $body['company_id'] ?? $this->company_id;
        $this->user_id = $body['user_id'] ?? $this->user_id;
        $this->name = $body['name'] ?? $this->name;
        $this->description = $body['description'] ?? $this->description;
        $this->updated_at = date('Y-m-d H:i:s');

        $gateway->update($this->toArray(), ['id = ?' => $this->id]);

        return $this;
    }
}