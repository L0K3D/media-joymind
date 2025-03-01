<?php

class MediaManager {
    public static function init() {
        self::enqueueAssets();
    }

    private static function enqueueAssets() {
        echo '<link rel="stylesheet" href="'. MEDIA_JOYMIND_URL .'assets/style.css">';
        echo '<script src="'. MEDIA_JOYMIND_URL .'assets/script.js" defer></script>';
    }

    public static function getModal() {
        include MEDIA_JOYMIND_PATH . 'templates/modal.php';
    }

    public static function createInstance($inputId, $multiple = false, $types = ["image/jpeg", "image/png"]) {
        $instanceId = uniqid();
        $typesJson = htmlspecialchars(json_encode($types), ENT_QUOTES, 'UTF-8');

        echo '
            <input type="hidden" name="'. $inputId .'" id="'. $inputId .'" value="">
            <button type="button" class="btn btn-outline-primary media-picker"
                data-input="'. $inputId .'"
                data-multiple="'. ($multiple ? "true" : "false") .'"
                data-types="'. $typesJson .'"
                data-instance="'. $instanceId .'">Select Media</button>
        ';
    }
}
