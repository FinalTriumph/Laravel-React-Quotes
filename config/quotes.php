<?php

return [
    'sources' => [
        'forismatic' => [
            'url' => 'https://api.forismatic.com/api/1.0/?method=getQuote&format=json&lang=en',
            'title' => 'Forismatic',
            'website' => 'https://www.forismatic.com/en/'
        ],
        'quoterism' => [
            'url' => 'https://www.quoterism.com/api/quotes/random',
            'title' => 'Quoterism',
            'website' => 'https://www.quoterism.com/'
        ],
        'zen' => [
            'url' => 'https://zenquotes.io/api/random',
            'title' => 'Zen Quotes',
            'website' => 'https://zenquotes.io/'
        ],
        /* 'programming' => [
            'url' => 'https://programming-quotes-api.azurewebsites.net/api/quotes/random',
            'title' => 'Programming Quotes',
            'website' => 'https://programming-quotes-api.azurewebsites.net/'
        ], */
        'favqs' => [
            'url' => 'https://favqs.com/api/qotd',
            'title' => 'FavQs',
            'website' => 'https://favqs.com/'
        ],
    ]
];