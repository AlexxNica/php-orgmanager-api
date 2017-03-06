<?php

namespace OrgManager\ApiClient;

use GuzzleHttp\Client;

class OrgManager
{
    /** @var \GuzzleHttp\Client */
    protected $client;

    /** @var string */
    protected $baseUrl;

    /**
     * @param \GuzzleHttp\Client $client
     * @param string             $apiToken
     * @param string             $rootUrl
     */
    public function __construct(Client $client, $apiToken, $rootUrl = 'https://orgmanager.miguelpiedrafita.com')
    {
        $this->client = $client;
        
        $this->apiToken = $apiToken;
        
        $this->baseUrl = $rootUrl.'/api';
    }

    /**
     *
     * @return array
     */
    public function getroot()
    {
        return $this->makeRequest('');
    }

    /**
     * @param string $resource
     * @param array  $query
     *
     * @return array
     */
    public function makeRequest($resource, array $query = [])
    {
        $results = $this->client
            ->get("{$this->baseUrl}{$resource}", compact('query'))
            ->getBody()
            ->getContents();

        return json_decode($results, true);
    }
}
