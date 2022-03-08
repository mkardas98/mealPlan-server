<?php

return [
    [
        'name' => 'Dashboard',
        'route_name' => 'home',
        'icon' => 'mdi-home',
        'can' => 'home'
    ],
    [
        'name' => 'Użytkownicy',
        'route_name' => 'clients.index',
        'icon' => 'mdi-account-group',
        'can' => 'clients'
    ]
];
