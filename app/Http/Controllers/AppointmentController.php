<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::latest()->get();

        return view('appointments', compact('appointments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pet_name' => 'required|string|max:255',
            'breed' => 'required|string|max:255',
            'customer_name' => 'required|string|max:255',
            'service' => 'required|string|max:255',
            'veterinarian' => 'required|string|max:255',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required',
        ]);

        Appointment::create([
            'pet_name' => $request->pet_name,
            'breed' => $request->breed,
            'customer_name' => $request->customer_name,
            'service' => $request->service,
            'veterinarian' => $request->veterinarian,
            'appointment_date' => $request->appointment_date,
            'appointment_time' => $request->appointment_time,
            'status' => 'Pending',
        ]);

        return redirect()
            ->route('appointments.index')
            ->with('success', 'Appointment added successfully!');
    }

    public function edit($id)
    {
        $appointment = Appointment::findOrFail($id);

        return view('appointments-edit', compact('appointment'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pet_name' => 'required|string|max:255',
            'breed' => 'required|string|max:255',
            'customer_name' => 'required|string|max:255',
            'service' => 'required|string|max:255',
            'veterinarian' => 'required|string|max:255',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required',
            'status' => 'required|string',
        ]);

        $appointment = Appointment::findOrFail($id);

        $appointment->update([
            'pet_name' => $request->pet_name,
            'breed' => $request->breed,
            'customer_name' => $request->customer_name,
            'service' => $request->service,
            'veterinarian' => $request->veterinarian,
            'appointment_date' => $request->appointment_date,
            'appointment_time' => $request->appointment_time,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('appointments.index')
            ->with('success', 'Appointment updated successfully!');
    }

    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);

        $appointment->delete();

        return redirect()
            ->route('appointments.index')
            ->with('success', 'Appointment deleted successfully!');
    }
}