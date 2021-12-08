<?php

namespace CodeBugLab\OpenSubtitles\Repository;

/**
 * @see https://opensubtitles.stoplight.io/docs/opensubtitles-api/
 */
class SubtitleRepository extends AbstractRepository
{
    /**
     * @see https://opensubtitles.stoplight.io/docs/opensubtitles-api/b3A6Mjc1MTk3MjY-search-for-subtitles
     */
    public function searchForSubtitles(array $parameters): self
    {
        $this->response = $this->apiGenerator->get("subtitles?" . http_build_query($parameters));
        return $this;
    }
}
