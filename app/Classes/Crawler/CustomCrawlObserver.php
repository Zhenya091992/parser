<?php

namespace App\Classes\Crawler;

use App\Exceptions\CustomCrawlObserverException;
use App\Models\Category;
use App\Models\UnitData;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\View;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UriInterface;
use Spatie\Crawler\CrawlObservers\CrawlObserver;
use DiDom\Document;

class CustomCrawlObserver extends CrawlObserver
{
    protected Category $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function willCrawl(UriInterface $url): void
    {

    }

    public function crawled(UriInterface $url, ResponseInterface $response, ?UriInterface $foundOnUrl = null): void
    {
        if ($response->getStatusCode() == 200) {
            $response->getBody()->rewind();
            $data = $response->getBody()->getContents();

            $pq = new Document($data);
            $valueUnitData = [];
            foreach ($this->category->components_category as $nameValue => $nameAttribute) {
                $elements = $pq->find($nameAttribute);
                if (count($elements) > 0) {
                    foreach ($elements as $key => $element) {
                        $valueUnitData[$key][$nameValue] = $element->getNode()->textContent ?? 'not found';
                    }
                }
            }

            $this->category->id ?? $this->category->save();
            foreach ($valueUnitData as $value) {
                UnitData::create([
                    'categories_id' => $this->category->id,
                    'user_id' => $this->category->user_id,
                    'name' => 'name',
                    'value' => $value,
                ]);
            }
        }
    }

    public function crawlFailed(UriInterface $url, RequestException $requestException, ?UriInterface $foundOnUrl = null): void
    {
        echo '!!! Crawl Failed !!! : ' . $url . PHP_EOL . '<br>';
    }
}
