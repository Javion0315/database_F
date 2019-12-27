<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Operation;
use App\Patient;
use App\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function patients()
    {
        $patients = Patient::all();

        return view('patient', ['patient' => $patients]);
    }

    public function patient(Patient $patient)
    {
        // $patient = Patient::find($id);
        $patient->update([
            'name' => request('Pname'),
            'sex' => request('Psex'),
            'b_date' => request('Pdate')
        ]);

        //  Patient::update([
        //     'name' => request('Pname'),
        //     'sex' => request('Psex'),
        //     'b_date' => request('Pdate')
        // ]);
        // $patient->save();


        // return view('patient', ['patient' => $patients])->with('success', '修改成功');
        return redirect()->route('patients')->with('success', '修改成功');
    }

    public function create() {
        Patient::create([
            'name' => request('Pname'),
            'sex' => request('Psex'),
            'b_date' => request('Pdate')
        ]);
        return redirect()->route('patients')->with('success', '新增成功');
    }

    public function deletePatient(Patient $patient)
    {
        $patient->delete();

        return redirect()->route('patients');
        // return response()->json(['msg' => 'OK'], 200);
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
