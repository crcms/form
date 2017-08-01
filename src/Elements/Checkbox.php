<?php

namespace CrCms\Form\Elements;

/**
 * Class Checkbox
 * @package CrCms\Form\Elements
 */
class Checkbox extends AbstractElement
{
    /**
     * @var array
     */
    protected $options = [];

    /**
     * @return string
     */
    public function getType(): string
    {
        return 'checkbox';
    }

    /**
     * @param array $options
     * @return Checkbox
     */
    public function options(array $options): self
    {
        $this->options = $options;
        return $this;
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param null $value
     * @return AbstractElement
     */
    public function value($value = null): AbstractElement
    {
        $value = (array)$value;
        return parent::value($value);
    }

    /**
     * @return array
     */
    protected function call()
    {
        return array_merge($this->call, ['options']);
    }
}