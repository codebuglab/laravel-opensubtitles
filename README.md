# ⚡⚡⚡ Laravel OpenSubtitles

Simple integration with OpenSubtitles API to search for and download subtitles.

![Laravel media removable](logo.png)

## Table of contents
- [Setup](#setup)
    - [Installation](#installation)
    - [Publish](#publish)
- [Instructions](#Instructions)
    - [Subtitles](#subtitles)
        - [Search For Subtitles](#search-for-subtitles)
    - [Download](#download)
        - [Details](#details)
        - [Get Zip File By Legacy Subtitle Id](#get-zip-file-by-legacy-subtitle-id)
- [License](#license)
## Setup
### Installation

To install this package through composer run the following command in the terminal

```bash
composer require codebuglab/laravel-opensubtitles
```
### Publish
You have to publish config file with this artisan command:
```bash
php artisan vendor:publish --provider="CodeBugLab\OpenSubtitles\OpenSubtitlesServiceProvider"
```
- File `opensubtitles.php` will be publish in `config` folder after that.
- Then you have to put your opensubtitles api key in your `env` file like this `OpenSubtitles_API_KEY=xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx`.

## Instructions
- You can use opensubtitles api and get information your want, first take a quick look at [official api page](https://opensubtitles.stoplight.io/docs/opensubtitles-api/).
- For all next API requests you have to use OpenSubtitles facade 
```php
use CodeBugLab\OpenSubtitles\Facades\OpenSubtitles;
```
- Every request have it's own parameters and response and we gonna explain it in details




### Subtitles

#### Search For Subtitles
```php
$parameters = [
    'imdb_id' => "315642",
    'languages' => 'en',
    'type' => 'movie'
];
$opensubtitles = OpenSubtitles::subtitles()->searchForSubtitles($parameters)->toArray();
```
- Simply this will search for subtitles depends on movie id in opensubtitles, IMDB id or even TMDB id.
- For more information about parameters and response [click here](https://opensubtitles.stoplight.io/docs/opensubtitles-api/b3A6Mjc1MTk3MjY-search-for-subtitles).




### Download

#### Details
```php
$parameters = [
    'file_id' => "2712566",
    'sub_format' => 'srt'
];
$srtFile = OpenSubtitles::download()->details($parameters)->getSrt();
```
- Here you can get srt file by file_id that you can get from [search for subtitles](#search-for-subtitles) query.
- You can download the file with other format, take a look at this [link](https://opensubtitles.stoplight.io/docs/opensubtitles-api/b3A6Mjc1MTk3MTk-subtitle-formats) to know all other formats you can download.
- Unfortunately there is a limit depends on your opensubtitle account start from 10 up to 1000 download per day.
- For more information about parameters and response [click here](https://opensubtitles.stoplight.io/docs/opensubtitles-api/b3A6Mjc1MTk3Mjc-download).

#### Get Zip File By Legacy Subtitle Id
```php
$legacySubtitleId = "7090487";
$zipFile = OpenSubtitles::download()->getZipFileByLegacySubtitleId($legacySubtitleId);
```
- This is unofficial way to download the subtitles but it still supported by opensubtitles website.
- We need legacy subtitle id instead of file id and both are available in [search for subtitles](#search-for-subtitles) response.
- There is no specific limit to download by using this method.



## License

This package is a free software distributed under the terms of the MIT license.
