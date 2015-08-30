<?php

namespace app\assets;

use yii\web\AssetBundle;

class MDLPluginAsset extends AssetBundle
{
    public $sourcePath = '@bower/material-design-lite';
    public $js = [
        'material.js',
    ];
    public $publishOptions = [
        'only' => [
            'material*',
            '*.js',
        ],
        'except' => [
            'src/',
            'utils/',
        ],
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}