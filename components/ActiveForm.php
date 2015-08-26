<?php

namespace app\components;

class ActiveForm extends \yii\widgets\ActiveForm
{
    public $fieldClass = 'app\components\ActiveField';
    public $errorCssClass = 'is-invalid';
    public $attributes = ['errorCssClass' => 'mdl-textfield__error'];
}