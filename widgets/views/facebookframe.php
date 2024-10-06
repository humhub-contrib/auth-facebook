<?php

use yii\helpers\Url;
use humhub\libs\Html;
use yii\web\View;
use humhubContrib\auth\facebook\assets\Assets;

Assets::register($this);

?>
<div class="panel panel-default panel-facebook" id="panel-facebook">
    <?= \humhub\widgets\PanelMenu::widget(['id' => 'panel-facebook']); ?>
    <div class="panel-heading">
        <?= Yii::t('AuthFacebookModule.base', '<strong>Facebook</strong> Page'); ?>
    </div>
    <div class="panel-body">
        <div id="fb-root"></div>
        <div class="fb-page" 
             data-href="<?= $facebookUrl; ?>"
             data-tabs="timeline"
             data-width=""
             data-height="500"
             data-small-header="false"
             data-adapt-container-width="true"
             data-hide-cover="false"
             data-show-facepile="true">
            <blockquote cite="<?= $facebookUrl; ?>" class="fb-xfbml-parse-ignore">
                <a href="<?= $facebookUrl; ?>">Facebook Page</a>
            </blockquote>
        </div>
    </div>
</div>