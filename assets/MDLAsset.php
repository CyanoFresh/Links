<?php

namespace app\assets;

use yii\web\AssetBundle;

class MDLAsset extends AssetBundle
{
    public $sourcePath = '@bower/material-design-lite';
    public $css = [
        'material.css',
    ];
    public $publishOptions = [
        'only' => [
            '*.css',
            'material*',
        ],
        'except' => [
            'src/',
            'utils/',
        ],
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'app\assets\MDLPluginAsset',
    ];
}