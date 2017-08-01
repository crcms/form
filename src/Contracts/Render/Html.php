<?php

namespace CrCms\Form\Contracts\Render;

use CrCms\Form\Contracts\Render;
use CrCms\Form\Elements\AbstractElement;

/**
 * Interface Html
 * @package CrCms\Form\Contracts\Render
 */
interface Html extends Render
{
    /**
     * @param AbstractElement $element
     * @return string
     */
    public function render(AbstractElement $element): string;
}