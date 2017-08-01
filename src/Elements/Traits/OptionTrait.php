<?php
namespace CrCms\Form\Elements\Traits;

/**
 * Class OptionTrait
 * @package CrCms\Form\Elements\Traits
 */
trait OptionTrait
{
    /**
     * @var array
     */
    protected $options = [];

    /**
     * @param array $options
     * @return OptionTrait
     */
    public function options($options) : self
    {
        if ($options instanceof \Closure) {
            $options = call_user_func($options);
            if (!is_array($options)) {
                throw new \UnexpectedValueException('Type Error');
            }
        }

        array_walk($options,function(&$value,$key){
            $value = ['key'=>$key,'value'=>$value];
        });

        $this->options = $options;
        return $this;
    }

    /**
     * @return array
     */
    public function getOptions(): array
    {
        return $this->options;
    }
}