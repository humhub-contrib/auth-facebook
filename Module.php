<?php

namespace humhubContrib\auth\facebook;

use yii\helpers\Url;

/**
 * @inheritdoc
 */
class Module extends \humhub\components\Module
{

    /**
     * @inheritdoc
     */
    public $resourcesPath = 'resources';

    /**
     * @inheritdoc
     */
    public function getConfigUrl()
    {
        return Url::to(['/auth-facebook/admin']);
    }

    public function getFacebookUrl()
    {
        $url = $this->settings->get('facebookUrl');

        if (empty($url) || strpos($url, 'facebook.com') === false) {
            return null;
        }

        return $url;
    }

    /**
     * @inheritdoc
     */
    public function disable()
    {
        // Cleanup all module data, don't remove the parent::disable()!!!
        parent::disable();
    }
}
