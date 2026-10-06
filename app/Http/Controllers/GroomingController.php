<?php

namespace App\Http\Controllers;

use App\Models\Grooming;
use Illuminate\Http\Request;

class GroomingController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | DISPLAY GROOMING
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $groomings = Grooming::latest()->get();

        return view('grooming', compact('groomings'));
    }


    /*
    |--------------------------------------------------------------------------
    | ADD / BOOK GROOMING
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $request->validate([
            'pet_name' => 'required|string|max:255',
            'customer_name' => 'required|string|max:255',
            'grooming_service' => 'required|string|max:255',
            'groomer' => 'required|string|max:255',
            'grooming_date' => 'required|date',
            'grooming_time' => 'required',
        ]);

        Grooming::create([
            'pet_name' => $request->pet_name,
            'customer_name' => $request->customer_name,
            'grooming_service' => $request->grooming_service,
            'groomer' => $request->groomer,
            'grooming_date' => $request->grooming_date,
            'grooming_time' => $request->grooming_time,
            'status' => 'Pending',
        ]);

        return redirect()
            ->route('grooming.index')
            ->with(
                'success',
                'Grooming appointment added successfully!'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | EDIT PAGE
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {
        $grooming = Grooming::findOrFail($id);

        return view(
            'grooming-edit',
            compact('grooming')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE GROOMING
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, $id)
    {
        $request->validate([
            'pet_name' => 'required|string|max:255',
            'customer_name' => 'required|string|max:255',
            'grooming_service' => 'required|string|max:255',
            'groomer' => 'required|string|max:255',
            'grooming_date' => 'required|date',
            'grooming_time' => 'required',
            'status' => 'required|string',
        ]);

        $grooming = Grooming::findOrFail($id);

        $grooming->update([
            'pet_name' => $request->pet_name,
            'customer_name' => $request->customer_name,
            'grooming_service' => $request->grooming_service,
            'groomer' => $request->groomer,
            'grooming_date' => $request->grooming_date,
            'grooming_time' => $request->grooming_time,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('grooming.index')
            ->with(
                'success',
                'Grooming appointment updated successfully!'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE STATUS
    |--------------------------------------------------------------------------
    |
    | Pending
    |     ↓ Check-in
    | In Progress
    |     ↓ Done
    | Completed
    |
    */

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Pending,In Progress,Completed',
        ]);

        $grooming = Grooming::findOrFail($id);

        $grooming->update([
            'status' => $request->status,
        ]);

        return redirect()
            ->route('grooming.index')
            ->with(
                'success',
                'Grooming status updated successfully!'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | DELETE GROOMING
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $grooming = Grooming::findOrFail($id);

        $grooming->delete();

        return redirect()
            ->route('grooming.index')
            ->with(
                'success',
                'Grooming appointment deleted successfully!'
            );
    }
}