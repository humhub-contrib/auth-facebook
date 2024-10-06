<?php


namespace humhubContrib\auth\facebook\assets;

use Yii;
use yii\web\AssetBundle;

class Assets extends AssetBundle
{
    public $sourcePath = '@auth-facebook/resources';

    public $js = [
        'js/humhub.facebook.js',
    ];
    public $depends = [
        'humhub\assets\AppAsset',
    ];
}