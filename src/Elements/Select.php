<?php

namespace CrCms\Form\Elements;

use CrCms\Form\Elements\Traits\OptionTrait;

/**
 * Class Select
 * @package CrCms\Form\Elements
 */
class Select extends AbstractElement
{
    use OptionTrait;

    /**
     * @var bool
     */
    protected $multiple = false;

    protected $optionTip = '请选择数据';

    protected $optionTipValue = '';

    /**
     * @return string
     */
    public function getType() : string
    {
        return 'select';
    }

    public function optionTipValue(string $value)
    {
        $this->optionTipValue = $value;
        return $this;
    }


    public function optionTip(string $tip) : self
    {
        $this->optionTip = $tip;
        return $this;
    }

    public function getOptionTipValue(): string
    {
        return $this->optionTipValue;
    }

    public function getOptionTip() : string
    {
        return $this->optionTip;
    }


    /**
     * @param bool $multiple
     * @return Select
     */
    public function multiple(bool $multiple) : self
    {
        $this->multiple = $multiple;
        return $this;
    }

    /**
     * @return bool
     */
    public function getMultiple() : bool
    {
        return $this->multiple;
    }

    /**
     * @param null $value
     * @return AbstractElement
     */
    public function value($value = null) : AbstractElement
    {
        $value = (array)$value;
        return parent::value($value);
    }

    /**
     * @return array
     */
    protected function call() : array
    {
        return array_merge($this->call,['options','multiple','optionTip','optionTipValue']);
    }
}