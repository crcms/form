<?php

namespace CrCms\Form\Elements;

/**
 * Class hidden
 * @package CrCms\Form\Elements
 */
class hidden extends AbstractElement
{
    protected function getType()
    {
        return 'hidden';
    }

    /**
     * @return array
     */
    protected function call()
    {
        return ['type','name','value'];
    }
}