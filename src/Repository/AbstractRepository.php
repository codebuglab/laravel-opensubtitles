<?php

namespace CodeBugLab\OpenSubtitles\Repository;

use CodeBugLab\OpenSubtitles\Url\ApiGenerator;

abstract class AbstractRepository
{
    public static $apiUrl = "https://api.opensubtitles.com/api/v1/";

    protected $apiGenerator;

    protected $response;

    public function __construct(ApiGenerator $apiGenerator)
    {
        $this->apiGenerator = $apiGenerator;
    }

    public function toArray(): array
    {
        return json_decode($this->response, true);
    }
}
