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

    public function post($path, $fields)
    {
        return $this->httpRequest->post($this->apiUrl.$path, $fields, $this->getHeaders());
    }

    public function get($path)
    {
        return $this->httpRequest->get($this->apiUrl.$path, $this->getHeaders());
    }

    protected function getHeaders(): array
    {
        return [
            'Accept' => 'application/json',
            'Content-type' => 'application/json',
            'Api-Key' => $this->apiKey,
            'User-Agent' => '<<{{APP_NAME}} v{{APP_VERSION}}>>',
        ];
    }
}
