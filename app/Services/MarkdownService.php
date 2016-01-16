<?php

namespace App\Services;

use App\User;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Util;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Support\Facades\App;
use League\CommonMark\Converter;

class MarkdownService implements SelfHandling
{
    protected $converter;
    protected $mdContent;

    public function __construct(Converter $converter)
    {
        $this->converter = $converter;
    }

    public function get($contentFileName)
    {
        try
        {
            $contentFileNameFull = base_path() . '/resources/content/'. $contentFileName . '.md';

            $this->mdContent = \File::get($contentFileNameFull);
        }
        catch (Illuminate\Filesystem\FileNotFoundException $exception)
        {
            die("The file doesn't exist");
        }

        return $this->htmlContent = $this->converter->convertToHtml($this->mdContent);
    }

    public function handle()
    {
    }
}