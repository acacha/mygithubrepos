<?php

namespace App\Services;
use GuzzleHttp\Client;

/**
 * Class GithubService
 * @package App\Services
 */
class GithubService
{
    /**
     * @var mixed
     */
    protected $token;

    /**
     * @var Client
     */
    protected $guzzle;

    /**
     * @var string
     */
    protected $github_api_url = 'https://api.github.com';

    /**
     * @var string
     */
    protected $uri = '/user/repos';

    /**
     * GithubService constructor.
     * @param Client $guzzle
     */
    public function __construct(Client $guzzle)
    {
        $this->token = env('GITHUB_TOKEN');
        $this->guzzle = $guzzle;
    }

    /**
     * @return static
     */
    public function obtainRepos()
    {
        $res = $this->guzzle->request('GET',$this->gitHubReposUrl(),
            [
                "auth" => $this->credentials()
            ]
        );

        return collect(\GuzzleHttp\json_decode($res->getBody()))->pluck('name');
    }

    /**
     * @return string
     */
    private function gitHubReposUrl()
    {
        return $this->github_api_url . $this->uri;
    }

    /**
     * @return array
     */
    private function credentials()
    {
        return ['acacha',$this->token];
    }
}