<?php

namespace CodeBugLab\OpenSubtitles;

use CodeBugLab\OpenSubtitles\Repository\DownloadRepository;
use CodeBugLab\OpenSubtitles\Repository\SubtitleRepository;

class OpenSubtitles
{
    private $downloadRepository;
    private $subtitleRepository;

    public function __construct(
        DownloadRepository $downloadRepository,
        SubtitleRepository $subtitleRepository
    ) {
        $this->downloadRepository = $downloadRepository;
        $this->subtitleRepository = $subtitleRepository;
    }

    public function download(): DownloadRepository
    {
        return $this->downloadRepository;
    }

    public function subtitles(): SubtitleRepository
    {
        return $this->subtitleRepository;
    }
}
