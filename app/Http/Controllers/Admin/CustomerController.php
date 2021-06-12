<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveCustomerRequest;
use App\Models\Customer;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function index(): View
    {
        $customers = Customer::whereNull('deleted_at')->latest()->paginate(15);

        return view( 'admin.customers.index', compact('customers') );
    }

    public function create(): View
    {
        return view( 'admin.customers.create' );
    }

    public function store(SaveCustomerRequest $request): RedirectResponse
    {
        $customer = Customer::create($request->validated());
        return redirect()->route('admin.customers.show', $customer);
    }

    public function show(Customer $customer): View
    {
        $users = $customer->users;
        return view( 'admin.customers.show', compact('customer', 'users') );

    }

    public function edit(Customer $customer): View
    {
        return view( 'admin.customers.show', $customer );
    }

    public function update(Request $request, Customer $customer): RedirectResponse
    {
        return redirect()->route('admin.customers.show', $customer);
    }

    public function destroy(Customer $customer): RedirectResponse
    {
        return redirect()->route('admin.customers.index');
    }
}
