<?php
/* @var $this \humhub\components\View */
/* @var $model \humhubContrib\auth\facebook\models\ConfigureForm */

use humhub\widgets\bootstrap\Button;
use humhub\widgets\bootstrap\Link;
use humhub\widgets\form\ActiveForm;
use yii\helpers\Html;

?>
<div class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading">
            <?= Yii::t('AuthFacebookModule.base', '<strong>Facebook</strong> Sign-In configuration') ?></div>

        <div class="panel-body">
            <p>
                <?= Link::primary(Yii::t('AuthFacebookModule.base', 'Facebook Documentation'))
                    ->link('https://developers.facebook.com/docs/facebook-login/overview')
                    ->blank()->loader(false)
                    ->right()->sm() ?>
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

            <?= Button::save()->submit() ?>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
