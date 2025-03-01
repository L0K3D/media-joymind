<?php
if (!defined('MEDIA_JOYMIND_LOADED')) {
    define('MEDIA_JOYMIND_LOADED', true);

    define('MEDIA_JOYMIND_URL', '/libs/media-joymind/');
    define('MEDIA_JOYMIND_PATH', $_SERVER['DOCUMENT_ROOT'] . MEDIA_JOYMIND_URL);

    require_once MEDIA_JOYMIND_PATH . 'config.php';
    require_once MEDIA_JOYMIND_PATH . 'classes/MediaManager.php';

    MediaManager::init();
}
