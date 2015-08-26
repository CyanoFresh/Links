<?php

/* @var $this yii\web\View */

use app\components\ActiveForm;
use yii\helpers\Html;

$this->title = 'Home';
$this->registerMetaTag([
    'name' => 'description',
    'content' => 'Transform your long URL into short one for FREE! Do less get more!'
])
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
                'validateOnType' => true,
            ]) ?>

            <?= $form->field($model, 'long_url')->input('url') ?>

            <?= Html::submitButton('Short', [
                'class' => 'mdl-button mdl-button--raised mdl-button--accent mdl-js-button mdl-js-ripple-effect',
            ]) ?>

            <div class="mdl-spinner mdl-js-spinner" id="loadingSpinner"></div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</section>

<section class="section--center mdl-grid hidden" id="result-section">
    <div class="mdl-card mdl-shadow--2dp">
        <div class="mdl-card__title">
            <h2 class="mdl-card__title-text">Here is your shortened URL</h2>
        </div>
        <div class="mdl-card__supporting-text">
            <form>
                <textarea id="result" onclick="select()" readonly></textarea>
                <label class="visuallyhidden" for="result">Shortened Link</label>
            </form>
        </div>
        <div class="mdl-card__actions mdl-card--border">
            <a class="mdl-button mdl-js-button mdl-js-ripple-effect" id="copyButton">
                Copy
            </a>
            <a class="mdl-button mdl-js-button mdl-js-ripple-effect" id="shareButton">
                Share
            </a>
        </div>
    </div>
</section>

<?php $this->beginBlock('modals'); ?>

    <!-- Share Modal -->
    <div class="modal fade" id="shareModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Share shortened link</h4>
                </div>
                <div class="modal-body">
                    <p>To share your shortened URL click on preferable type:</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="mdl-button mdl-js-button mdl-js-ripple-effect" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

<?php $this->endBlock(); ?>