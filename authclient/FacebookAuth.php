<?php

namespace humhubContrib\auth\facebook\authclient;

use Yii;
use yii\authclient\clients\Facebook;
use yii\web\NotFoundHttpException;

/**
 * Facebook allows authentication via Facebook OAuth.
 */
class FacebookAuth extends Facebook
{

    /**
     * @inheritdoc
     */
    protected function defaultViewOptions()
    {
        return [
            'popupWidth' => 860,
            'popupHeight' => 480,
            'cssIcon' => 'fa fa-facebook',
            'buttonBackgroundColor' => '#e0492f',
        ];
    }

    /**
     * @inheritdoc
     */
    protected function defaultNormalizeUserAttributeMap()
    {
        return [
            'username' => 'name',
        ];
    }
}
