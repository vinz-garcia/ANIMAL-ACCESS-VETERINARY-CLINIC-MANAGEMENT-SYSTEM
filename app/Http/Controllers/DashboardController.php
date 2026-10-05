<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\Customer;
use App\Models\Appointment;
use App\Models\Grooming;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPets = Pet::count();

        $totalCustomers = Customer::count();

        $totalAppointments = Appointment::count();

        $totalGrooming = Grooming::count();

        $todayAppointments = Appointment::whereDate(
            'appointment_date',
            today()
        )->latest('appointment_time')->get();

        $todayGrooming = Grooming::whereDate(
            'grooming_date',
            today()
        )->latest('grooming_time')->get();

        return view('dashboard', compact(
            'totalPets',
            'totalCustomers',
            'totalAppointments',
            'totalGrooming',
            'todayAppointments',
            'todayGrooming'
        ));
    }
}