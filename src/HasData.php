<?php

namespace CrCms\Form;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

/**
 * Class HasData
 * @package CrCms\Form
 */
trait HasData
{
    /**
     * @var string
     */
    protected $dataKey = 'id';

    /**
     * @param array $data
     * @param Form $form
     * @return array
     */
    public function filter(array $data, Form $form): array
    {
        return $data;
    }

    /**
     * @param array $data
     * @param array $rule
     * @param Form $form
     * @return bool
     */
    public function validate(array $data, array $rule, Form $form): bool
    {
        $validator = Validator::make($data, $rule);
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        return true;
    }

    /**
     * @param array $data
     * @param Form $form
     * @return mixed
     */
    public function save(array $data, Form $form)
    {
        return empty($data[$this->dataKey]) ?
            $this->create($data) :
            $this->update($data, array_pull($data, $this->dataKey));
    }

    /**
     * @param array $data
     * @return mixed
     */
    abstract public function create(array $data);

    /**
     * @param array $data
     * @param array|string $id
     * @return mixed
     */
    abstract public function update(array $data, $id);

    /**
     * @param string $key
     * @return HasData
     */
    public function setDataKey(string $key): self
    {
        $this->dataKey = $key;
        return $this;
    }

    /**
     * @return string
     */
    public function getDataKey(): string
    {
        return $this->dataKey;
    }
}