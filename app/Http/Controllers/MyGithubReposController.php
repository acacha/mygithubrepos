<?php

namespace App\Http\Controllers;

use App\Services\GithubService;

/**
 * Class MyGithubReposController
 * @package App\Http\Controllers
 */
class MyGithubReposController extends Controller
{

    protected $github;

    /**
     * MyGithubReposController constructor.
     * @param $github
     */
    public function __construct(GithubService $github)
    {
        $this->github = $github;
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $githubrepos = $this->github->obtainRepos();

        return view('mygithubrepos', compact('githubrepos'));
    }
}
