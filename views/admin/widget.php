<?php

/* @var $this \humhub\modules\ui\view\components\View */
/* @var $model \humhubContrib\auth\facebook\models\ConfigureForm */

use humhub\modules\ui\icon\widgets\Icon;
use yii\bootstrap\ActiveForm;
use humhub\widgets\Button;
use yii\helpers\Html;
use yii\helpers\Url;

?>
<div class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading">
            <?= Yii::t('AuthFacebookModule.base', '<strong>Facebook</strong> Sign-In configuration') ?></div>

        <div class="panel-body">
            <p>
                <?= Button::asLink(Icon::get('cog'))
                ->link(Url::to(['index']))
                ->cssClass('pull-right btn btn-default')
                ->tooltip(Yii::t('AuthFacebookModule.base', 'OAuth Settings')) ?>
                <?= Button::asLink(Icon::get('facebook'))
                ->link('https://developers.facebook.com/docs/plugins/page-plugin/')
                ->cssClass('pull-right btn btn-default')
                ->options(['target' => '_blank'])
                ->tooltip(Yii::t('AuthFacebookModule.base', 'Facebook Documentation')) ?>
                <?= Yii::t('AuthFacebookModule.base', 'Please see Facebook Docs for better understanding of the Facebook Page Plugin.'); ?>
                <br/>
            </p>
            <br/>

            <?php $form = ActiveForm::begin(['id' => 'configure-form', 'enableClientValidation' => false, 'enableClientScript' => false]); ?>

            <br />
            <?= $form->field($model, 'facebookUrl')->textInput(); ?>
            <br/>

            <div class="form-group">
                <?= Html::submitButton(Yii::t('base', 'Save'), ['class' => 'btn btn-primary', 'data-ui-loader' => '']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>