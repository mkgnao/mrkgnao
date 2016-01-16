<?php

namespace App\Services;

use App\Models\MdContent as MdContent;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Support\Facades\App;
use League\CommonMark\Converter;


class MarkdownService implements SelfHandling
{
    protected $converter;

    public function __construct(Converter $converter)
    {
        $this->converter = $converter;
    }

    public function get($mdContentName)
    {

        $mdContent = MdContent::where('md_name', $mdContentName)->first();

        if (!$mdContent)
            return 'could not find: ' . $mdContentName;


        return $this->converter->convertToHtml($mdContent->md_content);
    }

    public function handle()
    {
    }
}