<?php

namespace CodeBugLab\OpenSubtitles\Url;

use CodeBugLab\OpenSubtitles\HttpRequest\HttpRequestInterface;

class ApiGenerator implements ApiGeneratorInterface
{
    public $url;

    protected $apiUrl;

    protected $apiKey;

    protected $httpRequest;

    public function __construct(string $apiUrl, string $apiKey, HttpRequestInterface $httpRequest)
    {
        $this->apiUrl = $apiUrl;

        $this->apiKey = $apiKey;

        $this->httpRequest = $httpRequest;
    }

    public function post($path, $fields, $headers)
    {
        return $this->httpRequest->post($this->apiUrl . $path, $fields, $headers);
    }

    public function get($path, $headers)
    {
        return $this->httpRequest->get($this->apiUrl . $path, $headers);
    }
}
