<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\DomCrawler\Crawler;

class Parser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parser:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $html = file_get_contents('https://ru.wikipedia.org/wiki/Заглавная_страница');

        // Create new instance for parser.
        $crawler = new Crawler(null, 'https://ru.wikipedia.org/wiki/Заглавная_страница');
        $crawler->addHtmlContent($html, 'UTF-8');

        var_dump($crawler->filterXPath('//*[@id="main-tfa"]/p[1]')->text());



    }
}
