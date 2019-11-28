<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Operation;
use App\Patient;
use App\Ward;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('home');
    }
    public function versiontwo()
    {
        return view('dashboard.v2');
    }
    public function versionthree()
    {
        return view('dashboard.v3');
    }

    public function patient()
    {
        $patient = Patient::All();
        return view('patient', ['patient' => $patient]);
    }

    public function doctor()
    {
        $doctor = Doctor::All();
        return view('doctor', ['doctor' => $doctor]);
    }

    public function ward()
    {
        $ward = Ward::All();
        return view('ward', ['ward' => $ward]);
    }

    public function operation()
    {
        $operation = Operation::All();
        return view('operation', ['operation' => $operation]);
    }
}
