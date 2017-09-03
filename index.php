<?php
require_once('functions.php');
require_once('data.php');

$is_auth = (bool) rand(0, 1);
$user_name = 'Константин';
$user_avatar = 'img/user.jpg';

// устанавливаем часовой пояс в Московское время
date_default_timezone_set('Europe/Moscow');
// записать в эту переменную оставшееся время в этом формате (ЧЧ:ММ)
$lot_time_remaining = "00:00";
// временная метка для полночи следующего дня
$tomorrow = strtotime('tomorrow midnight');
// временная метка для настоящего времени
$now = strtotime('now');
// далее нужно вычислить оставшееся время до начала следующих суток и записать его в переменную $lot_time_remaining
$lot_time_remaining = gmdate('H:i:s', ($tomorrow - $now));

$lot_category = ['Доски и лыжи', 'Крепления', 'Ботинки', 'Одежда', 'Инструменты', 'Разное'];

$title = 'Главная';

$template_content_data = [
    'lot_time_remaining' => $lot_time_remaining,
    'lot_category' => $lot_category,
    'lots_list' => $lots_list
];

$template_content = renderTemplate('templates/index.php', $template_content_data);

$template_layout_data = [
    'template_content' => $template_content,
    'title' => $title,
    'is_auth' => $is_auth,
    'user_name' => $user_name,
    'user_avatar' => $user_avatar
];

$template_layout = renderTemplate('templates/layout.php', $template_layout_data);

echo $template_layout;

?>
