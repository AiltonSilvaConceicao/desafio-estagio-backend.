<?php
// Aside menu
return [

    'items' => [
        // Dashboard
        [
            'title' => 'Filtro Por Categoria',
            'root' => true,
            'icon' => 'media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => '/',
            'new-tab' => false,
        ],
        [
            'title' => 'Filtro por Limitação',
            'root' => true,
            'icon' => 'media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => 'limit-search',
            'new-tab' => false,
        ],
        [
            'title' => 'Filtro por Ordenação',
            'root' => true,
            'icon' => 'media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => 'ordem-search',
            'new-tab' => false,
        ],
        [
            'title' => 'Filtro - Conteudo (Bônus)',
            'root' => true,
            'icon' => 'media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => 'content-search',
            'new-tab' => false,
        ]
    ]
];
