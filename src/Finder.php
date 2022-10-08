<?php

namespace Vguimaraes5\AluraCourseFinder;

use GuzzleHttp\ClientInterface;
use Symfony\Component\DomCrawler\Crawler;

class Finder
{
    /**
     * @var ClientInterface
     */
    private $httpClient;

    /**
     * @var Crawler
     */
    private $crawler;

    public function __construct(ClientInterface $httpClient, Crawler $crawler)
    {
        $this->httpClient = $httpClient;
        $this->crawler = $crawler;
    }

    public function find(string $url): array
    {
        $response = $this->httpClient->request('GET', $url);
        $html = $response->getBody();

        $this->crawler->addHtmlContent($html);

        $courses = $this->crawler->filter('span.card-curso__nome');

        $courseNames = [];
        foreach ($courses as $course) {
            $courseNames[] = $course->textContent;
        }

        return $courseNames;
    }
}
