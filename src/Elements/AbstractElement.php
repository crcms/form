<?php
namespace CrCms\Form\Elements;

use CrCms\Form\AttributeTrait;
use CrCms\Form\ElementFactory;

/**
 * Class AbstractElement
 * @package CrCms\Form\Elements
 */
abstract class AbstractElement
{
    use AttributeTrait;

    const DISPLAY_SHOW = 1;

    const DISPLAY_HIDDEN = 2;

    const DISPLAY_INVISIBLE = 3;

    protected $name = '';

    protected $tip = '';

    protected $label = '';

    protected $value = null;

    protected $default = null;

    protected $renderer = null;

    protected $rule = [];

    protected $icon = '';

    protected $display = self::DISPLAY_SHOW;

    protected $call = ['type','name','attributes','display','value','rule','label','tip','icon'];

    public function __construct(string $name = '')
    {
        $this->name = $name;
    }

    public function rule(array $rule) : AbstractElement
    {
        $this->rule = $rule;
        return $this;
    }

    public function name(string $name) : AbstractElement
    {
        $this->name = $name;
        return $this;
    }

    public function display(int $display) : AbstractElement
    {
        $this->display = $display;
        return $this;
    }

    public function default(string $value) : AbstractElement
    {
        $this->default = $value;
        return $this;
    }

    public function value($value = null) : AbstractElement
    {
        $this->value = $value;
        return $this;
    }

    public function icon(string $icon) : AbstractElement
    {
        $this->icon = $icon;
        return $this;
    }

    public function tip(string $tip) : AbstractElement
    {
        $this->tip = $tip;
        return $this;
    }

    public function label(string $label) : AbstractElement
    {
        $this->label = $label;
        return $this;
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function getLabel() : string
    {
        return $this->label;
    }

    public function getIcon() : string
    {
        return $this->icon;
    }

    public function getTip() : string
    {
        return $this->tip;
    }

    public function getValue()
    {
        if ($this->value === null) {
            $this->value = $this->default;
        }
        return $this->value;
    }

    public function getDefault()
    {
        return $this->default;
    }

    public function getRule() : array
    {
        return $this->rule;
    }

    public function getDisplay() : int
    {
        return $this->display;
    }


    public function getElementAttributes() : array
    {
        $elements = collect($this->call)->filter(function($item) {
            return method_exists($this,'get'.ucwords($item));
        })->mapWithKeys(function($item) {
            return [$item=>call_user_func([$this,'get'.ucwords($item)])];
        })->toArray();

        if (empty($elements['name'])) {
            throw new \DomainException('the element attribute name is not found');
        }

        return $elements;
    }


    public function render()
    {
        if (method_exists($this,'call')) {
            $this->call = $this->call();
        }

        return ElementFactory::factory($this);
    }
}