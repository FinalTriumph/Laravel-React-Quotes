<?php

namespace App\Plugins;

use Illuminate\Support\Facades\Http;

class RandomQuote
{
    //
    private $sources= [
        'forismatic' => 'https://api.forismatic.com/api/1.0/?method=getQuote&format=json&lang=en',
        'programming' => 'https://programming-quotes-api.azurewebsites.net/api/quotes/random',
        'zen' => 'https://zenquotes.io/api/random',
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
            default:
                break;
        }
        return $return;
    }

    //
    private function prepareForismatic(array $data): array
    {
        return [
            'quote' => $data['quoteText'],
            'author' => $data['quoteAuthor'],
            'source' => 'forismatic'
        ];
    }

    //
    private function prepareProgramming(array $data): array
    {
        return [
            'quote' => $data['text'],
            'author' => $data['author'],
            'source' => 'programming',
        ];
    }

    //
    private function prepareZen(array $data): array
    {
        return [
            'quote' => $data[0]['q'],
            'author' => $data[0]['a'],
            'source' => 'zen'
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