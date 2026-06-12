<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\CustomerRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CustomerController extends Controller
{
    public function index(): View
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    public function create(): View
    {
        return view('customers.create');
    }

    public function store(CustomerRequest $request): RedirectResponse
    {
        Customer::create($request->validated());
        return redirect()->route('customers.index')
            ->with('success', 'Cliente registrado con éxito');
    }

    public function show(Customer $customer): View
    {
        return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer): View
    {
        return view('customers.edit', compact('customer'));
    }

    public function update(CustomerRequest $request, Customer $customer): RedirectResponse
    {
        $customer->update($request->validated());
        return redirect()->route('customers.index')
            ->with('success', 'Cliente actualizado con éxito.');
    }

    public function destroy (Customer $customer): RedirectResponse
    {
        $customer->delete();
        return redirect()->route('customers.index')
            ->with('success', 'Cliente eliminado con éxito.');
    }
}
