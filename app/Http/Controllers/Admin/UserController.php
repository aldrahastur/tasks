<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(): View
    {
        $users = User::where('is_admin', 0)->latest()->paginate(10);

        return \view('admin.users.index', compact('users'));
    }

    public function create(): View
    {
        //
    }

    public function store(Request $request): RedirectResponse
    {
        //
    }

    public function show($id): View
    {
        //
    }

    public function edit($id): View
    {
        //
    }

    public function update(Request $request, $id): RedirectResponse
    {
        //
    }

    public function destroy($id): RedirectResponse
    {
        //
    }
}
