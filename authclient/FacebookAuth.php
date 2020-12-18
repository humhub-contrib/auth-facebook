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
            'username' => 'name',
            'firstname' => function ($attributes) {
                if (!isset($attributes['name'])) {
                    return '';
                }
                $parts = mb_split(' ', $attributes['name'], 2);
                if (isset($parts[0])) {
                    return $parts[0];
                }
                return '';
            },
            'lastname' => function ($attributes) {
                if (!isset($attributes['name'])) {
                    return '';
                }
                $parts = mb_split(' ', $attributes['name'], 2);
                if (isset($parts[1])) {
                    return $parts[1];
                }
                return '';
            },
            'email' => function ($attributes) {
                if (empty($attributes['email'])) {
                    throw new NotFoundHttpException('Could not find E-mail in Facebook account. Set email in facbook account settings.');
                }
                return $attributes['email'];
            },
        ];
    }
}
