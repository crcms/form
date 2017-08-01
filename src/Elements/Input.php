<?php

namespace CrCms\Form\Elements;

/**
 * Class Input
 * @package CrCms\Form\Elements
 */
class Input extends AbstractElement
{
    /**
     * @var string
     */
    protected $type = 'text';

    /**
     * @return string
     */
    public function getType() : string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Input
     */
    public function type(string $type) : self
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return array
     */
    protected function call()
    {
        return array_merge($this->call,['type']);
    }
}