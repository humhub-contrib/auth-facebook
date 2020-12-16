<?php

namespace humhubContrib\auth\facebook\models;

use Yii;
use yii\base\Model;
use yii\helpers\Url;
use humhubContrib\auth\facebook\Module;

/**
 * The module configuration model
 */
class ConfigureForm extends Model
{
    /**
     * @var boolean Enable this authclient
     */
    public $enabled;

    /**
     * @var string the app id provided by Facebook
     */
    public $appId;

    /**
     * @var string the app secret provided by Facebook
     */
    public $appSecret;

    /**
     * @var string readonly
     */
    public $redirectUri;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['appId', 'appSecret'], 'required'],
            [['enabled'], 'boolean'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'enabled' => Yii::t('AuthFacebookModule.base', 'Enabled'),
            'appId' => Yii::t('AuthFacebookModule.base', 'App ID'),
            'appSecret' => Yii::t('AuthFacebookModule.base', 'App secret'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return [
        ];
    }

    /**
     * Loads the current module settings
     */
    public function loadSettings()
    {
        /** @var Module $module */
        $module = Yii::$app->getModule('auth-google');

        $settings = $module->settings;

        $this->enabled = (boolean)$settings->get('enabled');
        $this->appId = $settings->get('appId');
        $this->appSecret = $settings->get('appSecret');

        $this->redirectUri = Url::to(['/user/auth/external', 'authclient' => 'facebook'], true);
    }

    /**
     * Saves module settings
     */
    public function saveSettings()
    {
        /** @var Module $module */
        $module = Yii::$app->getModule('auth-facebook');

        $module->settings->set('enabled', (boolean)$this->enabled);
        $module->settings->set('appId', $this->appId);
        $module->settings->set('appSecret', $this->appSecret);

        return true;
    }

    /**
     * Returns a loaded instance of this configuration model
     */
    public static function getInstance()
    {
        $config = new static;
        $config->loadSettings();

        return $config;
    }

}
