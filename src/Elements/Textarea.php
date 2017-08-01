<?php

namespace CrCms\Form\Elements;

/**
 * Class Textarea
 * @package CrCms\Form\Elements
 */
class Textarea extends AbstractElement
{
    /**
     * @return string
     */
    public function getType() : string
    {
        return 'textarea';
    }
}