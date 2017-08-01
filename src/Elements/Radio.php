<?php

namespace CrCms\Form\Elements;

use CrCms\Form\Elements\Traits\OptionTrait;

/**
 * Class Radio
 * @package CrCms\Form\Elements
 */
class Radio extends AbstractElement
{
    use OptionTrait;
    /**
     * @var array
     */
    protected $options = [];

    /**
     * @return string
     */
    public function getType() : string
    {
        return 'radio';
    }

//    /**
//     * @param array $options
//     * @return Radio
//     */
//    public function options(array $options) : self
//    {
//        $this->options = $options;
//        return $this;
//    }

//    /**
//     * @return array
//     */
//    public function getOptions()
//    {
//        return $this->options;
//    }

    /**
     * @return array
     */
    protected function call()
    {
        return array_merge($this->call,['options']);
    }
}