<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function welcome(): View
    {
        $page = Page::findOrFail(1);
        return \view('page', compact('page'));
    }

}
