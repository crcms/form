<?php

namespace CrCms\Form\Contracts;

use CrCms\Form\Elements\AbstractElement;

/**
 * Interface Render
 * @package CrCms\Form\Contracts
 */
interface Render
{
    /**
     * @param AbstractElement $element
     * @return mixed
     */
    public function render(AbstractElement $element);
}