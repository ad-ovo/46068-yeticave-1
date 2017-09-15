<?php
require_once('functions.php');
require_once('data.php');

$title = 'Страница входа';
$index_page = false;

$login_error = [];
$login_error_message = [
    'email' => 'Введите логин',
    'password' => 'Введите пароль'
];
$login_required = ['email', 'password'];
$login_item = [];

$nav_data = [
    'lot_category' => $lot_category
];

$nav = renderTemplate('templates/global/nav.php', $nav_data);

$template_content_data = [
    'nav' => $nav
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    foreach ($_POST as $key => $value) {
        $value = validateInput($value);
        $login_item[$key] = $value;
        var_dump($login_item[$key]);

        if (in_array($key, $login_required) && $value = '') {
            $login_error[] = $key;
            var_dump($login_error);
        }
    }

    if (empty($login_error)) {
        var_dump($login_item['email']);
        echo 'success';
    } else {
        echo 'fail';

        $template_content_data = [
            'nav' => $nav,
            'login_item' => $login_item
        ];

        $template_content = renderTemplate('templates/custom/login.php', $template_content_data);

        $template_layout_data = [
            'nav' => $nav,
            'template_content' => $template_content,
            'title' => $title,
            'index_page' => $index_page
        ];

        $template_layout = renderTemplate('templates/global/layout.php', $template_layout_data);

        echo $template_layout;
    }
}

$template_content = renderTemplate('templates/custom/login.php', $template_content_data);

$template_layout_data = [
    'nav' => $nav,
    'template_content' => $template_content,
    'title' => $title,
    'index_page' => $index_page
];

$template_layout = renderTemplate('templates/global/layout.php', $template_layout_data);

echo $template_layout;

?>
