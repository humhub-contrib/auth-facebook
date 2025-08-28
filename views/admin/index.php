<?php
/* @var $this \humhub\components\View */
/* @var $model \humhubContrib\auth\facebook\models\ConfigureForm */

use humhub\widgets\form\ActiveForm;
use yii\helpers\Html;

?>
<div class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading">
            <?= Yii::t('AuthFacebookModule.base', '<strong>Facebook</strong> Sign-In configuration') ?></div>

        <div class="panel-body">
            <p>
                <?= Html::a(Yii::t('AuthFacebookModule.base', 'Facebook Documentation'), 'https://developers.facebook.com/docs/facebook-login/overview', ['class' => 'btn btn-primary float-end btn-sm', 'target' => '_blank']); ?>
                <?= Yii::t('AuthFacebookModule.base', 'Please follow the Facebook instructions to create the required <strong>OAuth client</strong> credentials.'); ?>
                <br/>
            </p>
            <br/>

            <?php $form = ActiveForm::begin(['id' => 'configure-form', 'enableClientValidation' => false, 'enableClientScript' => false]); ?>

            <?= $form->field($model, 'enabled')->checkbox(); ?>

            <br/>
            <?= $form->field($model, 'clientId'); ?>
            <?= $form->field($model, 'clientSecret'); ?>

            <br/>
            <?= $form->field($model, 'redirectUri')->textInput(['readonly' => true]); ?>
            <br/>

            <div class="mb-3">
                <?= Html::submitButton(Yii::t('base', 'Save'), ['class' => 'btn btn-primary', 'data-ui-loader' => '']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
