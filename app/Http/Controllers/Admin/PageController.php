<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function index(): View
    {
        $pages = Page::all();
        return view( 'page.index', compact('pages') );
    }

    public function create(): View
    {
        return view( 'page.create' );
    }

    public function store(Request $request): RedirectResponse
    {
        redirect()->route('page.show', $page);
    }

    public function show(Page $page): View
    {
         return view( 'page.show', $page );
    }

    public function edit(Page $page): View
    {
        return view( 'page.show', $page );
    }

    public function update(Request $request, Page $page): RedirectResponse
    {
        return redirect()->route('page.show', $page);
    }

    public function destroy(Page $page): RedirectResponse
    {
        return redirect()->route('page.index');
    }
}
