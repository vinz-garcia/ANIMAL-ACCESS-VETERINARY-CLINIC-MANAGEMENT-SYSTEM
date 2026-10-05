<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
   public function index()
{
    $pets = Pet::latest()->get();
    $customers = \App\Models\Customer::orderBy('customer_name')->get();

    return view('pets', compact('pets', 'customers'));
}

    public function store(Request $request)
{
    $request->validate([
        'pet_name' => 'required|string|max:255',
        'species' => 'required|string|max:255',
        'breed' => 'nullable|string|max:255',
        'gender' => 'nullable|string|max:255',
        'age' => 'nullable|integer|min:0',
        'weight' => 'nullable|numeric|min:0',
        'status' => 'nullable|string|max:255',
        'vaccines' => 'nullable|string',
        'clinical_notes' => 'nullable|string',
        'last_visit' => 'nullable|date',
        'customer_name' => 'required|string|max:255',
    ]);

    Pet::create([
        'pet_name' => $request->pet_name,
        'species' => $request->species,
        'breed' => $request->breed,
        'gender' => $request->gender,
        'age' => $request->age,
        'weight' => $request->weight,
        'status' => $request->status ?? 'Healthy',
        'vaccines' => $request->vaccines,
        'clinical_notes' => $request->clinical_notes,
        'last_visit' => $request->last_visit,
        'customer_name' => $request->customer_name,
    ]);

    return redirect()
        ->route('pets.index')
        ->with('success', 'Pet added successfully!');
}
    public function edit($id)
    {
        $pet = Pet::findOrFail($id);

        return view('pets-edit', compact('pet'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'pet_name' => 'required|string|max:255',
        'species' => 'required|string|max:255',
        'breed' => 'nullable|string|max:255',
        'gender' => 'nullable|string|max:255',
        'age' => 'nullable|integer|min:0',
        'weight' => 'nullable|numeric|min:0',
        'status' => 'nullable|string|max:255',
        'vaccines' => 'nullable|string',
        'clinical_notes' => 'nullable|string',
        'last_visit' => 'nullable|date',
        'customer_name' => 'required|string|max:255',
    ]);

    $pet = Pet::findOrFail($id);

    $pet->update([
        'pet_name' => $request->pet_name,
        'species' => $request->species,
        'breed' => $request->breed,
        'gender' => $request->gender,
        'age' => $request->age,
        'weight' => $request->weight,
        'status' => $request->status ?? 'Healthy',
        'vaccines' => $request->vaccines,
        'clinical_notes' => $request->clinical_notes,
        'last_visit' => $request->last_visit,
        'customer_name' => $request->customer_name,
    ]);

    return redirect()
        ->route('pets.index')
        ->with('success', 'Pet updated successfully!');
}

    public function destroy($id)
    {
        $pet = Pet::findOrFail($id);

        $pet->delete();

        return redirect()
            ->route('pets.index')
            ->with('success', 'Pet deleted successfully!');
    }
}