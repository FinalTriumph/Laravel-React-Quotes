<?php

namespace App\Plugins;

use Illuminate\Support\Facades\Http;

class RandomQuote
{
    //
    private $sources= [
        'forismatic' => 'https://api.forismatic.com/api/1.0/?method=getQuote&format=json&lang=en',
        'programming' => 'https://programming-quotes-api.azurewebsites.net/api/quotes/random', // Looks like currently not working
        'zen' => 'https://zenquotes.io/api/random',
        'quoterism' => 'https://www.quoterism.com/api/quotes/random',
        'favqs' => 'https://favqs.com/api/qotd'
    ];

    //
    private $default = 'forismatic';

    //
    private function prepareQuote(array $response, string $source): array
    {
        $return = [];
        switch($source) {
            case 'forismatic':
                $return = $this->prepareForismatic($response);
                break;
            case 'programming':
                $return = $this->prepareProgramming($response);
                break;
            case 'zen':
                $return = $this->prepareZen($response);
                break;
            case 'quoterism':
                $return = $this->prepareQuoterism($response);
                break;
            case 'favqs':
                $return = $this->prepareFavqs($response);
            default:
                break;
        }
        return $return;
    }

    //
    private function prepareForismatic(array $data): array
    {
        return [
            'text' => $data['quoteText'],
            'author' => $data['quoteAuthor'],
            'source' => 'forismatic'
        ];
    }

    //
    private function prepareProgramming(array $data): array
    {
        return [
            'text' => $data['text'],
            'author' => $data['author'],
            'source' => 'programming',
        ];
    }

    //
    private function prepareZen(array $data): array
    {
        return [
            'text' => $data[0]['q'],
            'author' => $data[0]['a'],
            'source' => 'zen'
        ];
    }

    //
    private function prepareQuoterism(array $data): array
    {
        /* return [
            'text' => $data['random']['text'],
            'author' => $data['random']['author']['name'],
            'source' => 'quoterism'
        ]; */

        return [
            'text' => $data['text'],
            'author' => $data['author']['name'],
            'source' => 'quoterism'
        ];
    }

    //
    private function prepareFavqs(array $data): array
    {
        return [
            'text' => $data['quote']['body'],
            'author' => $data['quote']['author'],
            'source' => 'favqs'
        ];
    }

    //
    public function get(string $source = null): array
    {
        if (!isset($this->sources[$source])) {
            $source = $this->default;
        }

        $response = Http::get($this->sources[$source]);
        $response = json_decode($response->body(), true);

        return $this->prepareQuote($response, $source);
    }
}