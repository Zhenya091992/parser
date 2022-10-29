<?php

namespace App\Helpers;

use Symfony\Component\DomCrawler\Crawler;

class HelperParser
{
    public static function run($url, array $params)
    {
        $agent= 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, $agent);
        curl_setopt($ch, CURLOPT_URL,$url);
        $page = curl_exec($ch);
        curl_close($ch);

        $crawler = new Crawler(null, $url);
        $crawler->addHtmlContent($page, 'UTF-8');
        foreach ($params as $name => $XPath) {
            $data[$name] = $crawler->filterXPath($XPath)->eq(0)->text();
        }

        return $data;
    }
}
