<?php

namespace CodeBugLab\OpenSubtitles\Facades;

use Illuminate\Support\Facades\Facade;

class OpenSubtitles extends Facade {

    protected static function getFacadeAccessor()
    {
        return 'OpenSubtitles';
    }

}
