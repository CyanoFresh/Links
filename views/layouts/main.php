<?php

use yii\helpers\Html;
use app\assets\AppAsset;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?= Html::csrfMetaTags() ?>

    <title><?= Html::encode($this->title) ?></title>

    <?php $this->head() ?>
</head>

<body class="mdl-color--grey-100 mdl-color-text--grey-700 mdl-base">
<?php $this->beginBody() ?>

<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
            <!-- Title -->
            <span class="mdl-layout-title">Links</span>
            <!-- Add spacer, to align navigation to the right -->
            <div class="mdl-layout-spacer"></div>
            <!-- Navigation. We hide it in small screens. -->
            <nav class="mdl-navigation mdl-layout--large-screen-only">
                <a class="mdl-navigation__link" href="<?= Url::to(['site/index']) ?>">Home</a>
                <a class="mdl-navigation__link" href="<?= Url::to(['site/about']) ?>">About</a>
                <a class="mdl-navigation__link" href="<?= Url::to(['site/api']) ?>">API</a>
            </nav>
        </div>
    </header>
    <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">Links</span>
        <nav class="mdl-navigation">
            <a class="mdl-navigation__link" href="<?= Url::home() ?>">Home</a>
            <a class="mdl-navigation__link" href="<?= Url::to(['site/about']) ?>">About</a>
            <a class="mdl-navigation__link" href="<?= Url::to(['site/api']) ?>">API</a>
        </nav>
        <span class="mdl-layout-title">Projects</span>
        <nav class="mdl-navigation">
            <a class="mdl-navigation__link" href="http://solomaha.me/">Solomaha.me</a>
            <a class="mdl-navigation__link" href="http://links.solomaha.me/">Links</a>
            <a class="mdl-navigation__link" href="http://projects.solomaha.me/">All projects</a>
        </nav>
    </div>
    <main class="mdl-layout__content">
        <div class="page-content">
            <?= $content ?>
        </div>
    </main>
</div>

<?php if (isset($this->blocks['modals'])): ?>
    <?= $this->blocks['modals'] ?>
<?php endif; ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
