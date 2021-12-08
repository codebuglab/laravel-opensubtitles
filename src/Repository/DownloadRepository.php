<?php

namespace CodeBugLab\OpenSubtitles\Repository;

/**
 * @see https://opensubtitles.stoplight.io/docs/opensubtitles-api/
 */
class DownloadRepository extends AbstractRepository
{
    /**
     * @see https://opensubtitles.stoplight.io/docs/opensubtitles-api/b3A6Mjc1MTk3Mjc-download
     */
    public function details(array $parameters): self
    {
        $this->response = $this->apiGenerator->post("download", $parameters);
        return $this;
    }

    /**
     * @see https://stackoverflow.com/a/11539639/11071527
     */
    public function getZipFileByLegacySubtitleId(int $subtitleId)
    {
        return file_get_contents("https://dl.opensubtitles.org/en/download/sub/" . $subtitleId);
    }

    public function getSrt()
    {
        return file_get_contents($this->toArray()['link']);
    }
}
