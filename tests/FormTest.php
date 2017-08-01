<?php

/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/11/18
 * Time: 11:15
 */
class FormTest extends TestCase
{

    protected $attributes = [
        'name'=>[
            'type'=>'input',
            'attribute'=>[
                'class'=>'form-control',
            ],
            'value'=>'abc',
            'name'=>'name1',
        ],
        'sex'=>[
            'type'=>'radio',
            'attribute'=>['class'=>'radio-inline'],
            'value'=>1,
            'option'=>[1=>'box',2=>'box2']
        ],
        'class_id'=>[
            'type'=>'select',
            'attribute'=>['class'=>'form-control'],
            'option'=>[1=>'option1',2=>'option2'],
            'value'=>2,
        ]
    ];


    public function testForm()
    {
//        $form = app(\CrCms\Form\FormRender::class);
//        dd($form);
        $form = new \CrCms\Form\FormRender(new \CrCms\Form\RenderDrives\Render());

        $string = $form->render($this->attributes);
dd($string);
//        dd($form);
//        $string = '1';
//        $this->assertEmpty($string);
    }

}