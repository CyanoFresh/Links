<?php

namespace app\components;

class ActiveField extends \yii\widgets\ActiveField
{
    public $options = ['class' => 'mdl-textfield mdl-js-textfield mdl-textfield--floating-label'];
    public $template = '{input}{label}{error}';
    public $inputOptions = ['class' => 'mdl-textfield__input'];
    public $labelOptions = ['class' => 'mdl-textfield__label'];
    public $errorOptions = [
        'tag' => 'span',
        'class' => 'mdl-textfield__error',
    ];
}