<?php

namespace RenduOpenSource\Startup;

use Symfony\Component\HttpClient\HttpClient;

class Startup
{
    public function getStartups(): array
    {
        $client = HttpClient::create([
            'verify_peer' => false,
        ]);
        $response = $client->request(
            'GET',
            'https://app.vivatechnology.com/partners?searchtext=&page=11&%24pagegroup=exhibitorspartners'
        );

        $allStartups = [];
        $content = $response->getContent();
        $dom = new \DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML($content);
        libxml_use_internal_errors(false);
        
        $xpath = new \DOMXPath($dom);
        $startupElements = $xpath->query('//span[@class="fieldval"]');
        
        foreach ($startupElements as $startup) {
            $allStartups[] = $startup->textContent;
        }
        
        return $allStartups;
    }
}