<?php

namespace humhubContrib\auth\facebook\authclient;

use Yii;
use yii\authclient\clients\Facebook;

/**
 * Facebook allows authentication via Facebook OAuth.
 */
class FacebookAuth extends Facebook
{
    /**
     * @inheritdoc
     */
    public $attributeNames = [
        'name',
        'first_name',
        'last_name',
        'email',
    ];

    /**
     * @inheritdoc
     */
    protected function initUserAttributes()
    {
        $attributes = parent::initUserAttributes();

        // The full name may contain characters which are not allowed in a username (e.g. spaces)
        $username = preg_replace('/[^\p{L}\d_\-@.]+/u', '.', (string)($attributes['name'] ?? ''));
        $username = mb_substr(trim($username, '.'), 0, Yii::$app->getModule('user')->maximumUsernameLength);
        if ($username !== '') {
            $attributes['username'] = $username;
        }

        return $attributes;
    }

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
            'firstname' => 'first_name',
            'lastname' => 'last_name',
        ];
    }
}
