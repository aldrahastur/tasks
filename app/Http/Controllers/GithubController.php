<?php

namespace App\Http\Controllers;

use GrahamCampbell\GitHub\Facades\GitHub;
use Illuminate\Support\Facades\Auth;


class GithubController extends Controller
{
    public function organizations()
    {
        var_dump(GitHub::getFactory()->make(['token' => Auth::user()->github_token, 'method' => 'token'])->repo()->all());
    }

    public function repos()
    {

    }

    public function issues()
    {
        var_dump(GitHub::getFactory()->make(['token' => Auth::user()->github_token, 'method' => 'token'])->issues()->all('aldrahastur', 'tasks', array('state' => 'open')));
    }
}
