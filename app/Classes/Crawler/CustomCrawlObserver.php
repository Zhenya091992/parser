<?php

namespace App\Classes\Crawler;

use App\Exceptions\CustomCrawlObserverException;
use App\Models\Category;
use App\Models\UnitData;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\View;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UriInterface;
use RuntimeException;
use Spatie\Crawler\CrawlObservers\CrawlObserver;
use DiDom\Document;

class CustomCrawlObserver extends CrawlObserver
{
    protected Category $category;

    protected $errsCrawl = [];

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function willCrawl(UriInterface $url): void
    {

    }

    public function crawled(UriInterface $url, ResponseInterface $response, ?UriInterface $foundOnUrl = null): void
    {
        $statusCode = $response->getStatusCode();
        if ($statusCode !== 200) {
            $this->errsCrawl[] = 'Crawl Failed: response status code ' . $statusCode . ' ' . $url;

            return;
        }

        $response->getBody()->rewind();
        $data = $response->getBody()->getContents();

        try {
            $pq = new Document($data);
        } catch (RuntimeException $exception) {
            $this->errsCrawl[] = 'Crawl Failed: ' . $exception;

            return;
        }

        $valueUnitData = [];
        foreach ($this->category->components_category as $nameValue => $nameAttribute) {
            $elements = $pq->find($nameAttribute);
            if (count($elements) > 0) {
                foreach ($elements as $key => $element) {
                    $valueUnitData[$key][$nameValue] = $element->getNode()->textContent ?? 'not found';
                }
            } else {
                $this->errsCrawl[] = 'Parse ' . $nameAttribute . 'failed in url: ' . $url;
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

    public function crawlFailed(UriInterface $url, RequestException $requestException, ?UriInterface $foundOnUrl = null): void
    {
        $this->errsCrawl[] = 'Crawl Failed: ' . $url;
    }

    public function finishedCrawling(): void
    {
        View::share('errsCrawl', $this->errsCrawl);
    }
}
