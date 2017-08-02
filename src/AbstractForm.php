<?php

namespace CrCms\Form;

/**
 * Class AbstractForm
 *
 * @package CrCms\Form
 */
abstract class AbstractForm
{
    /**
     * @var Form
     */
    protected $form = null;

    protected static $events = [];

    /**
     * AbstractForm constructor.
     *
     * @param Form $form
     */
    public function __construct(Form $form)
    {
        $this->form = $form;

        //$this->registerDefaultEvents();
    }

    /**
     * @return callable
     */
    protected function elements(): callable
    {
        return function (Form $form) {
            $reflection = new \ReflectionClass(get_class($this));
            foreach ($reflection->getMethods() as $method) {
                if (strpos($method->name, 'getElementBy') === 0) {
                    call_user_func([$this, $method->name], $form);
                }
            }
        };
    }

    /**
     * Create new form
     *
     * @return Form
     */
    public function form(): Form
    {
        return $this->form::create($this->elements());
    }

    /**
     * @return void
     */
//    protected function registerDefaultEvents()
//    {
//        $listeners = array_merge_recursive(config('form.listen'), static::$events);
//        foreach ($listeners as $event => $listener) {
//            $this->form::registerEvent($event, $listener);
//        }
//    }

    /**
     * @param string $name
     * @param array $arguments
     * @return mixed
     */
    public function __call(string $name, array $arguments)
    {
        $form = $this->form();
        if (method_exists($form, $name)) {
            return call_user_func_array([$form, $name], $arguments);
        }

        throw new \BadMethodCallException('method not exists');
    }

    public static function __callStatic($name, $arguments)
    {
        if (method_exists(Form::class, $name)) {
            return call_user_func_array([Form::class, $name], $arguments);
        }

        throw new \BadMethodCallException('method not exists');
    }
}