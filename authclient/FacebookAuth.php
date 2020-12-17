<?php

namespace humhubContrib\auth\facebook\authclient;

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
            'username' => 'displayName',
            'firstname' => function ($attributes) {
                if (!isset($attributes['given_name'])) {
                    return '';
                }

                return $attributes['given_name'];
            },
            'lastname' => function ($attributes) {
                if (!isset($attributes['family_name'])) {
                    return '';
                }
                return $attributes['family_name'];
            },
            'title' => 'tagline',
            'email' => function ($attributes) {
                if (empty($attributes['email'])) {
                    throw new NotFoundHttpException('Could not find E-mail in Facebook account. Set email in facbook account settings.');
                }
                return $attributes['email'];
            },
        ];
    }
}
