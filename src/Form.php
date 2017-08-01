<?php
namespace CrCms\Form;

use CrCms\Form\Contracts\Data;
use CrCms\Form\Elements\AbstractElement;
use CrCms\Event\HasEvents;

class Form
{

    use AttributeTrait,HasEvents;

    protected $elements = [];

    protected $action = '';

    protected $method = 'POST';

    protected $ajax = false;

    protected $originals = [];

    protected $data = [];


//    protected $renderer = null;
//
//    public function __construct(Render $render)
//    {
//        $this->renderer = $render;
//    }

    public function getData() : array
    {
        return $this->data;
    }

    public function getOriginals() : array
    {
        return $this->originals;
    }

    public static function create(callable $callback) : self
    {
        $instance = new static;
        $callback($instance);
        return $instance;
    }


    protected function getElementAttribute(string $key) : array
    {
        return array_map(function($element) use ($key){
            $method = 'get'.camel_case($key);
            return $element->$method();
        },$this->elements);
    }

    protected function handleFormData()
    {
        $this->originals = $_REQUEST;

        $names = $this->getElementAttribute('name');

        $this->data = array_only($this->originals,$names);

        return ;
    }


    public function dataRule() : array
    {
        return array_combine($this->getElementAttribute('name'),$this->getElementAttribute('rule'));
    }

    public function save(Data $handle)
    {
        $this->handleFormData();

        if ($this->fireEvent('filter_before') === false) {
            return false;
        }

        //filter
        $this->data = $handle->filter($this->data,$this);

        if (static::fireEvent('filter_after') === false || static::fireEvent('validate_before') === false) {
            return false;
        }

        $handle->validate($this->data,$this->dataRule(),$this);

        if (static::fireEvent('validate_after') === false || static::fireEvent('save_before') === false) {
            return false;
        }

        $model = $handle->save($this->data,$this);

        if (static::fireEvent('save_after') === false) {
            return false;
        }

        return $model;
    }


    public function add(AbstractElement $element,int $index = 0) : self
    {
        $this->elements[] = $element;//['index'=>$index,'element'=>$element];
        return $this;
    }


    public function render()
    {
//        $string = '';
//        foreach ($this->elements as $element) {
//            $string .= $element->render();
//        }



        switch (config('form.render')) {
            case 'html':
                return view('form::form',[
                    'action'=>$this->action,
                    'elements'=>array_map(function($element){return $element->render();},$this->elements),
                    //'elements'=>$this->elements,
                    'method'=>$this->method,
                    'ajax'=>$this->ajax,
                    'attributes'=>$this->attributes
                ])->render();
                break;
            case 'json':
                //return array_map(function($element){return $element->render();},$this->elements);
                return [
                    'action'=>$this->action,
                    'elements'=>array_map(function($element){return $element->render();},$this->elements),
                    //'elements'=>$this->elements,
                    'method'=>$this->method,
                    'ajax'=>$this->ajax,
                    'attributes'=>$this->attributes
                ];
                break;
        }

        //return $this->renderer->render();
    }

//    public function __toString()
//    {
//        return $this->render();
//    }


    public function action(string $action) : self
    {
        $this->action = $action;
        return $this;
    }


    public function method(string $method) : self
    {
        $this->method = $method;
        return $this;
    }


    public function ajax(bool $ajax) : self
    {
        $this->ajax = $ajax;
        return $this;
    }

    public static function events(): array
    {
        return array_keys(config('form.listen'));
    }


    public function button()
    {

    }


    public function __call($name, $arguments)
    {
        $class = 'CrCms\\Form\\Elements\\'.ucwords($name);
        if (class_exists($class)) {
            $object = new $class($arguments[0]);
            $this->add($object);
            return $object;
        }

        throw new \BadMethodCallException('method not exists');
    }

}