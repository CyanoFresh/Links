<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Home';
?>

<section class="section--center mdl-grid">
    <div class="card-wide mdl-card mdl-shadow--2dp">
        <div class="mdl-card__title">
            <h2 class="mdl-card__title-text">Welcome</h2>
        </div>
        <div class="mdl-card__supporting-text">
            <p>To short your URL put it in the field below and click on Short button.</p>

            <?php $form = ActiveForm::begin([
                'id' => 'form',
                'action' => ['site/short'],
            ]) ?>

            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <?= $form->field($model, 'long_url')->input('url', [
                    'class' => 'mdl-textfield__input',
                    'id' => 'longUrlInput',
                ])->label(false) ?>
                <label class="mdl-textfield__label" for="longUrlInput">Long URL</label>
                <span class="mdl-textfield__error">It is not a link!</span>
            </div>

            <?= Html::submitButton('Short', [
                'class' => 'mdl-button mdl-button--raised mdl-button--accent mdl-js-button mdl-js-ripple-effect',
            ]) ?>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</section>

<section class="section--center mdl-grid hidden">
    <div class="mdl-card mdl-shadow--2dp">
        <div class="mdl-card__title">
            <h2 class="mdl-card__title-text">Here is your shortened URL</h2>
        </div>
        <div class="mdl-card__supporting-text">
            <form>
                <textarea id="result" onclick="select()" readonly></textarea>
                <label class="visuallyhidden" for="result">Shortened Link</label>

                <div class="mdl-tooltip" for="result">
                    Press Ctrl + C to copy
                </div>
            </form>
        </div>
        <div class="mdl-card__actions mdl-card--border">
            <a class="mdl-button mdl-js-button mdl-js-ripple-effect" id="copyButton">
                Copy
            </a>
            <a class="mdl-button mdl-js-button mdl-js-ripple-effect">
                Share
            </a>
        </div>
    </div>
</section>