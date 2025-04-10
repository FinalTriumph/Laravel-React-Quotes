<?php

return [
    [
        'title' => 'Home',
        'route' => 'home',
        'scope' => 'all',
        'method' => 'get',
    ],
    [
        'title' => 'All Quotes',
        'route' => 'quotes.all',
        'scope' => 'all',
        'method' => 'get',
    ],
    [
        'title' => 'My Quotes',
        'route' => 'quotes.my',
        'scope' => 'auth',
        'method' => 'get',
    ],
    [
        'title' => 'Login',
        'route' => 'login',
        'scope' => 'guest',
        'method' => 'get',
    ],
    [
        'title' => 'Register',
        'route' => 'register',
        'scope' => 'guest',
        'method' => 'get',
    ],
    [
        'title' => 'User',
        'scope' => 'auth',
        'customTitle' => 'userAvatar',
        'customHeader' => 'userInfo',
        'dropdown' => [
            [
                'title' => 'Profile',
                'route' => 'user.profile',
                'scope' => 'auth',
                'method' => 'get',
            ],
            [
                'title' => 'Logout',
                'route' => 'logout',
                'scope' => 'auth',
                'method' => 'post',
            ]
        ],
    ],
];
