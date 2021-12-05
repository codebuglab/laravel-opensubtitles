<?php

namespace CodeBugLab\OpenSubtitles\HttpRequest;

interface HttpRequestInterface
{
    public function post(string $url, array $fields, array $header);

    public function get(string $url, array $header);
}
