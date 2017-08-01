<?php

namespace CrCms\Form\Contracts;

use CrCms\Form\Form;
use Illuminate\Validation\ValidationException;

/**
 * Interface Data
 * @package CrCms\Form\Contracts
 */
interface Data
{
    /**
     * @param array $data
     * @param Form $form
     * @return array
     */
    public function filter(array $data, Form $form): array;

    /**
     * @param array $data
     * @param array $rule
     * @param Form $form
     * @throws ValidationException
     * @return bool
     */
    public function validate(array $data, array $rule, Form $form): bool;

    /**
     * @param array $data
     * @param Form $form
     * @return mixed
     */
    public function save(array $data, Form $form);
}