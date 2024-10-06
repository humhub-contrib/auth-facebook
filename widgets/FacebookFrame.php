<?php

namespace humhubContrib\auth\facebook\widgets;

use Yii;
use yii\helpers\Url;
use humhub\libs\Html;
use humhub\components\Widget;

/**
 *
 * @author Felli
 */
class FacebookFrame extends Widget
{
    /**
     * @inheritdoc
     */
   public function run()
    {
        $url = Yii::$app->getModule('auth-facebook')->getFacebookUrl() . '';

        if (!$url) {
            return;
        }

        return $this->render('facebookframe', ['facebookUrl' => $url]);
    }
}