<?php

return [
    [
        'name' => 'Manage Search',
        'icon' => '<i style="font-size: 1rem;" class="fa-solid fa-table ps-2 pe-2 text-center  " aria-hidden="true"></i>',
        'route' => 'searches.index',
        'roles' => ['admin', 'staff'], // Accessible by admin only
    ],
    [
    'name' => 'Domains',
        'icon' => '<i style="font-size: 1rem;" class="fa-solid fa-user ps-2 pe-2 text-center  " aria-hidden="true"></i>',
        'route' => 'domain.index',
        'roles' => ['admin','staff'], // Accessible by both admin and user roles
    ],
    [
        'name' => 'User Management',
        'icon' => '<i style="font-size: 1rem;" class="fas fa-lg fa-list-ul ps-2 pe-2 text-center  " aria-hidden="true"></i>',
        'route' => 'user-management.index',
        'roles' => ['admin'], // Accessible by admin only
    ],
];
