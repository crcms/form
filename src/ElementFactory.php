<?php
namespace CrCms\Form;

use CrCms\Form\Elements\AbstractElement;

class ElementFactory
{

    public static function factory(AbstractElement $element)
    {
        switch (config('form.render')) {
            case 'html';
                $viewName = snake_case(class_basename(get_class($element)),'-');
                return view('form::'.config('form.view').'.'.$viewName,$element->getElementAttributes())->render();
                break;
            case 'json':
                return array_except($element->getElementAttributes(),'rule');
                break;
        }
    }

}