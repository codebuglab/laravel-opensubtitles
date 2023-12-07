<?php

namespace CodeBugLab\OpenSubtitles;

use CodeBugLab\OpenSubtitles\HttpRequest\Curl;
use CodeBugLab\OpenSubtitles\OpenSubtitles;
use CodeBugLab\OpenSubtitles\Repository\AbstractRepository;
use CodeBugLab\OpenSubtitles\Url\ApiGenerator;
use Illuminate\Support\ServiceProvider;

class OpenSubtitlesServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/config/opensubtitles.php',
            'opensubtitles'
        );

        $this->publishes([
            __DIR__ . '/config/opensubtitles.php' => config_path('opensubtitles.php'),
        ], 'config');
    }

    public function register()
    {
        $this->app->bind(ApiGenerator::class, function () {
            return new ApiGenerator(AbstractRepository::$apiUrl, config('opensubtitles.api_key'), config('opensubtitles.user_agent'), new Curl);
        });

        $this->app->singleton('OpenSubtitles', OpenSubtitles::class);
    }
}
