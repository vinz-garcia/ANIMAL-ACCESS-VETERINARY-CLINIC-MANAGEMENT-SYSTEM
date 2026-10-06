<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Pet;
use App\Models\Appointment;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::latest()->get();

        foreach ($customers as $customer) {

            // Get pets owned by this customer
            $customer->pet_list = Pet::where(
                'customer_name',
                $customer->customer_name
            )->get();

            // Count appointments/visits
            $customer->visit_count = Appointment::where(
                'customer_name',
                $customer->customer_name
            )->count();
        }

        return view('customers', compact('customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string',
        ]);

        Customer::create([
            'customer_name' => $request->customer_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
        ]);

        return redirect()
            ->route('customers.index')
            ->with('success', 'Customer added successfully!');
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);

        return view('customers-edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string',
        ]);

        $customer = Customer::findOrFail($id);

        $customer->update([
            'customer_name' => $request->customer_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
        ]);

        return redirect()
            ->route('customers.index')
            ->with('success', 'Customer updated successfully!');
    }

    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);

        $customer->delete();

        return redirect()
            ->route('customers.index')
            ->with('success', 'Customer deleted successfully!');
    }
}