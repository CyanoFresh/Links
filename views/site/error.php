<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>

<section class="section--center mdl-grid">
    <div class="mdl-card mdl-shadow--2dp">
        <div class="mdl-card__title">
            <h1 class="mdl-card__title-text"><?= Html::encode($this->title) ?></h1>
        </div>
        <div class="mdl-card__supporting-text">
            <p><?= nl2br(Html::encode($message)) ?></p>

            <p>
                The above error occurred while the Web server was processing your request.
            </p>
            <p>
                Please contact us if you think this is a server error. Thank you.
            </p>
        </div>
    </div>
</section>
