<?php

namespace CrCms\Form;

/**
 * Class AttributeTrait
 * @package CrCms\Form
 */
trait AttributeTrait
{
    /**
     * @var array
     */
    protected $attributes = [];

    /**
     * @param string $name
     * @param $value
     * @return AttributeTrait
     */
    public function attribute(string $name, $value): self
    {
        $this->attributes[$name] = $value;
        return $this;
    }

    /**
     * @param array $attributes
     * @return AttributeTrait
     */
    public function attributes(array $attributes): self
    {
        $this->attributes = $attributes;
        return $this;
    }

    /**
     * @param string $name
     * @return null
     */
    public function getAttribute(string $name)
    {
        return $this->attributes[$name] ?? null;
    }

    /**
     * @return array
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }
}