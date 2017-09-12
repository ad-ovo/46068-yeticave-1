<?php

require_once('functions.php');
require_once('data.php');

$title = 'Добавление лота';
$index_page = false;

$add_lot_error = [];
$add_lot_error_message = [
    'name' => 'Назовите лот',
    'category' => 'Выберите категорию для лота',
    'description' => 'Добавьте описание лота',
    'image' => 'Добавьте изображение в формате *.png/jpg/gif не превышающее 500кб.',
    'price' => 'Введите начальную цену лота в формате числового значения.',
    'step' => 'Определите шаг ставки лота в формате числового значения.',
    'due-date' => 'Определите дату завершения продажи лота в формате dd.mm.yyyy больше текущей даты.'
];
$add_lot_required = ['name', 'description', 'category', 'image', 'price', 'step', 'due-date'];
$lot_item = [];

$nav_data = [
    'lot_category' => $lot_category
];

$nav = renderTemplate('templates/global/nav.php', $nav_data);

if ($_SERVER['REQUEST_METHOD'] =='POST') {

    foreach ($_POST as $key => $value) {
        $value = validateInput($value);
        $lot_item[$key] = $value;

        if (in_array($key, $add_lot_required) && $value == '') {
            $add_lot_error[] = $key;
        }

        switch ($key) {
            case 'price':
                $value = validateNumericInput($value);

                if ($value == false) {
                    $add_lot_error[] = 'price';
                }

                break;

            case 'step':
                $value = validateNumericInput($value);

                if ($value == false) {
                    $add_lot_error[] = 'step';
                }

                break;

            case 'due-date':
                $value = validateDateInput($value);

                if ($value == false) {
                    $add_lot_error[] = 'due-date';
                }

                break;
        }
    }

    if (isset($_FILES['image'])) {
        $image_name = $_FILES['image']['name'];
        $image_path = 'img/';
        $image_type = $_FILES['image']['type'];
        $image_size = $_FILES['image']['size'];
        $image_valid_type = ['image/jpeg', 'image/png', 'image/gif'];
        $image_valid_size = 500000;

        if ($image_size > $image_valid_size) {
            $add_lot_error[] = 'image';
        }

        if ($image_type != (in_array($image_type, $image_valid_type))) {
            $add_lot_error[] = 'image';
        }

        move_uploaded_file($_FILES['image']['tmp_name'], $image_path . $image_name);

        $image_url =  $image_path . $image_name;
        $lot_item['image'] = $image_url;
    }


    if (empty($add_lot_error)) {
        $lots_list[] = $lot_item;

        $template_content_data = [
            'nav' => $nav,
            'lots_list' => $lots_list,
            'lot_id' => array_search($lot_item, $lots_list),
            'bets' => $bets,
            'lot_category' => $lot_category
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
    } else {

        $template_content_data = [
            'nav' => $nav,
            'lot_category' => $lot_category,
            'lot_item' => $lot_item,
            'add_lot_error' => $add_lot_error,
            'add_lot_error_message' => $add_lot_error_message,
            'lot_item' => $lot_item
        ];

        $template_content = renderTemplate('templates/custom/add-lot.php', $template_content_data);

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
    }
}

$template_content_data = [
    'nav' => $nav,
    'lot_category' => $lot_category,
    'lots_list' => $lots_list,
    'lot_item' => $lot_item
];

$template_content = renderTemplate('templates/custom/add-lot.php', $template_content_data);

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
