<?php

//$is_auth = (bool) rand(0, 1);
//$user_name = 'Константин';
//$user_avatar = 'img/user.jpg';

// ставки пользователей, которыми надо заполнить таблицу
$bets = [
    ['name' => 'Иван', 'price' => 11500, 'ts' => strtotime('-' . rand(1, 50) .' minute')],
    ['name' => 'Константин', 'price' => 11000, 'ts' => strtotime('-' . rand(1, 18) .' hour')],
    ['name' => 'Евгений', 'price' => 10500, 'ts' => strtotime('-' . rand(25, 50) .' hour')],
    ['name' => 'Семён', 'price' => 10000, 'ts' => strtotime('last week')]
];

$lot_category = ['Доски и лыжи', 'Крепления', 'Ботинки', 'Одежда', 'Инструменты', 'Разное'];

$lots_list = [
    [
        'name' => '2014 Rossignol District Snowboard',
        'category' => 'Доски и лыжи',
        'price' => '10999',
        'step' => '12000',
        'image' => 'img/lot-1.jpg',
        'description' => 'Легкий маневренный сноуборд, готовый дать жару в любом парке, растопив
                снег
                мощным щелчкоми четкими дугами. Стекловолокно Bi-Ax, уложенное в двух направлениях, наделяет этот
                снаряд
                отличной гибкостью и отзывчивостью, а симметричная геометрия в сочетании с классическим прогибом
                кэмбер
                позволит уверенно держать высокие скорости. А если к концу катального дня сил совсем не останется,
                просто
                посмотрите на Вашу доску и улыбнитесь, крутая графика от Шона Кливера еще никого не оставляла
                равнодушным.'
    ], [
        'name' => 'DC Ply Mens 2016/2017 Snowboard',
        'category' => 'Доски и лыжи',
        'price' => '159999',
        'step' => '12000',
        'image' => 'img/lot-2.jpg',
        'description' => 'Нет описания',
        'due-date' => '--.--.----'
    ], [
        'name' => 'Крепления Union Contact Pro 2015 года размер L/XL',
        'category' => 'Крепления',
        'price' => '8000',
        'step' => '12000',
        'image' => 'img/lot-3.jpg',
        'description' => 'Нет описания',
        'due-date' => '--.--.----'
    ], [
        'name' => 'Ботинки для сноуборда DC Mutiny Charocal',
        'category' => 'Ботинки',
        'price' => '10999',
        'step' => '12000',
        'image' => 'img/lot-4.jpg',
        'description' => 'Нет описания',
        'due-date' => '--.--.----'
    ], [
        'name' => 'Куртка для сноуборда DC Mutiny Charocal',
        'category' => 'Одежда',
        'price' => '7500',
        'step' => '12000',
        'image' => 'img/lot-5.jpg',
        'description' => 'Нет описания',
        'due-date' => '--.--.----'
    ], [
        'name' => 'Маска Oakley Canopy',
        'category' => 'Разное',
        'price' => '5400',
        'step' => '12000',
        'image' => 'img/lot-6.jpg',
        'description' => 'Нет описания',
        'due-date' => '--.--.----'
    ],
];


?>
