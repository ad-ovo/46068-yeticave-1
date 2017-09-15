<?php
require_once('functions.php');
require_once('data.php');

date_default_timezone_set('Europe/Moscow');
$lot_time_remaining = "00:00";
$tomorrow = strtotime('tomorrow midnight');
$now = strtotime('now');
$lot_time_remaining = gmdate('H:i:s', ($tomorrow - $now));

$title = 'Главная';
$index_page = true;

$nav_data = [
    'lot_category' => $lot_category
];

$nav = renderTemplate('templates/global/nav.php', $nav_data);

$template_content_data = [
    'nav' => $nav,
    'lot_time_remaining' => $lot_time_remaining,
    'lot_category' => $lot_category,
    'lots_list' => $lots_list
];

$template_content = renderTemplate('templates/custom/index.php', $template_content_data);

$template_layout_data = [
    'nav' => $nav,
    'template_content' => $template_content,
    'title' => $title,
    'index_page' => $index_page
];

$template_layout = renderTemplate('templates/global/layout.php', $template_layout_data);

echo $template_layout;

?>
