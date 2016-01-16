<?php

namespace App\Services;

use App\User;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Util;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Support\Facades\App;
use League\CommonMark\Converter;

class WritersService implements SelfHandling
{
    protected $converter;
    protected $mdContent;
    protected $htmlContent;

    public function __construct(Converter $converter)
    {
        $this->converter = $converter;

        try
        {
            $writersFilePath = Util::joinPaths(base_path(), 'resources/content/writers.md');

            $this->mdContent = \File::get($writersFilePath);
        }
        catch (Illuminate\Filesystem\FileNotFoundException $exception)
        {
            die("The file doesn't exist");
        }

        $this->htmlContent = $this->converter->convertToHtml($this->mdContent);
    }

    public function getWriters()
    {
        return $this->htmlContent;
    }

    public function handle()
    {
    }
}