<?php

namespace CrCms\Form;

use Illuminate\Support\ServiceProvider;
use CrCms\Event\Dispatcher;

/**
 * Class FormServiceProvider
 * @package CrCms\Form
 */
class FormServiceProvider extends ServiceProvider
{
    /**
     * @var bool
     */
    protected $defer = false;

    /**
     * @var string
     */
    protected $namespaceName = 'form';

    /**
     * @var string
     */
    protected $packagePath = __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR;

    /**
     *
     */
    public function boot()
    {
        //move config path
        $this->publishes([
            $this->packagePath.'config' => config_path(),
            $this->packagePath.'views' => resource_path('views/vendor/form'),
        ]);

        $this->loadViewsFrom($this->packagePath.'views', $this->namespaceName);

        Form::setDispatcher(new Dispatcher);
        foreach ($this->app->make('config')->get('form.listen') as $event=>$listener) {
            Form::registerEvent($event,$listener);
        }
    }

    /**
     *
     */
    public function register()
    {
        //merge config
        $configFile = $this->packagePath."config/{$this->namespaceName}.php";
        if (file_exists($configFile)) $this->mergeConfigFrom($configFile, $this->namespaceName);
    }

    /**
     * @return array
     */
    public function provides() : array
    {
        return [];
    }
}
