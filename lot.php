<?php

require_once('functions.php');
require_once('data.php');

if (isset($_GET['id'])) {
    $lot_id = $_GET['id'];
} else {
    $lot_id = 'undefined';
}

if (!array_key_exists($lot_id, $lots_list)) {
    /*var_dump(http_response_code());*/
    header('HTTP/1.0 404 Not Found');
    echo 'Ошибка 404';
    die();
}

$title = 'Страница лота';
$index_page = false;

$nav_data = [
    'lot_category' => $lot_category
];

$nav = renderTemplate('templates/global/nav.php', $nav_data);

$template_content_data = [
    'nav' => $nav,
    'lot_category' => $lot_category,
    'lots_list' => $lots_list,
    'lot_id' => $lot_id,
    'bets' => $bets
];

$template_content = renderTemplate('templates/custom/lot.php', $template_content_data);

$template_layout_data = [
    'nav' => $nav,
    'template_content' => $template_content,
    'title' => $title,
    'index_page' => $index_page,
    'is_auth' => $is_auth,
    'user_name' => $user_name,
    'user_avatar' => $user_avatar
];

$template_layout = renderTemplate('templates/global/layout.php', $template_layout_data);

echo $template_layout;

?>
