#!/usr/bin/env php
<?php

require 'vendor/autoload.php';

use Vguimaraes5\AluraCourseFinder\Finder;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client(['base_uri' => 'https://www.alura.com.br/']);
$crawler = new Crawler();
$finder = new Finder($client, $crawler);
$courses = $finder->find('/cursos-online-programacao/php');

foreach ($courses as $course) {
    showMessage($course);
}
