<?php

function renderTemplate($file_path, $data) {

    if(file_exists($file_path)) {
        ob_start();
        extract($data);
        require_once($file_path);
        return ob_get_clean();
    }

    return '';
}

?>
