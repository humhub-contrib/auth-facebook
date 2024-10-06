<?php

use humhub\modules\user\authclient\Collection;
use humhub\modules\dashboard\widgets\Sidebar;

return [
    'id' => 'auth-facebook',
    'class' => 'humhubContrib\auth\facebook\Module',
    'namespace' => 'humhubContrib\auth\facebook',
    'events' => [
        [Collection::class, Collection::EVENT_AFTER_CLIENTS_SET, ['humhubContrib\auth\facebook\Events', 'onAuthClientCollectionInit']],
        ['class' => Sidebar::class, 'event' => Sidebar::EVENT_INIT, 'callback' => ['humhubContrib\auth\facebook\Events', 'addfacebookFrame']],
    ],
];
