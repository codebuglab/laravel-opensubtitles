<?php

namespace CodeBugLab\OpenSubtitles\Url;

use CodeBugLab\OpenSubtitles\HttpRequest\HttpRequestInterface;

interface ApiGeneratorInterface
{
    public function __construct(string $apiUrl, string $apiKey, string $userAgent, HttpRequestInterface $httpRequest);
}
