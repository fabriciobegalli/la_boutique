<?php
return [
    'user' => [
        'type' => 1,
        'description' => 'Пользователь',
        'ruleName' => 'userGroup',
    ],
    'admin' => [
        'type' => 1,
        'description' => 'Администратор',
        'ruleName' => 'userGroup',
    ],
    'guest' => [
        'type' => 1,
        'ruleName' => 'userGroup',
    ],
];
