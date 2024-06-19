<?php

namespace CodeBugLab\OpenSubtitles\HttpRequest;

use Illuminate\Support\Facades\Http;

class Curl implements HttpRequestInterface
{
    public function post($url, $fields, $header)
    {
        $response = Http::withHeaders($header)->post($url, $fields);

        return $response->body();
    }

    public function get($url, $header)
    {
        $response = Http::withHeaders($header)->get($url);

        return $response->body();
    }
}
