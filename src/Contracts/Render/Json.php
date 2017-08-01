<?php

namespace CrCms\Form\Contracts\Render;

use CrCms\Form\Contracts\Render;
use CrCms\Form\Elements\AbstractElement;

interface Json extends Render
{
    /**
     * @param AbstractElement $element
     * @return array
     */
    public function render(AbstractElement $element): array;
}