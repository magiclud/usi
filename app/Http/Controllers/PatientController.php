<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;

class PatientController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $patients = \App\Patient::all();
        return response()->json($patients, 201);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $patient = new \App\Patient();
        $patient->first_name = $request->input('first_name');
        $patient->last_name = $request->input('last_name');
        $patient->phone = $request->input('phone');
        $patient->gender = $request->input('gender');
        $patient->birthday = $request->input('birthday');
        $patient->email = $request->input('email');
        $patient->save();

        $response = [
            'id' => $patient->id
        ];
        return response()->json($response, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $patient = \App\Patient::findOrFail($id);
        $response = [
            'id' => $patient->id,
            'first_name' => $patient->first_name,
            'last_name' => $patient->last_name,
            'phone' => $patient->phone,
            'gender' => $patient->gender,
            'birthday' => $patient->birthday,
            'email' => $patient->email
        ];
        return response()->json($response, 201);
    }

    public function read_appointments($id) {
        $patients_meetings = \App\Appointment::where('PATIENT_id', $id)->get();
        return response()->json($patients_meetings, 201);
    }

    public function read_appointment($patient_id, $appointment_id) {
        $patient_meeting = \App\Appointment::query()
                        ->where('PATIENT_id', $patient_id)
                        ->where('id', $appointment_id)->first();
        return response()->json($patient_meeting, 201);
    }

    public function appointments_by_date(Request $request, $id) {
        $patient_meetings = \App\Appointment::query()
                        ->where('PATIENT_id', $id)
                        ->whereDate('date', '=', $request->input('date'))->get();
        return response()->json($patient_meetings, 201);
    }

    public function appointments_by_speciality_and_by_date(Request $request, $id) {
        $list = \App\Doctor::where('SPECIALITY_id', $request->input('speciality_id'))->pluck('id');
        $patient_meetings = \App\Appointment::where('PATIENT_id', '=', $id)
                ->whereDate('date', '=', $request->input('date'))
                ->orWhereIn('DOCTOR_id', $list)->where('PATIENT_id', '=', $id)
                ->get();
        return response()->json($patient_meetings, 201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $phone = $request->input('phone');
        $gender = $request->input('gender');
        $birthday = $request->input('birthday');
        $email = $request->input('email');

        if ($first_name != NULL) {
            $update_doctor = \App\Patient::query()
                    ->where('id', $id)
                    ->update(['first_name' => $first_name]);
        } else if ($last_name != NULL) {
            $update_doctor = \App\Patient::query()
                    ->where('id', $id)
                    ->update(['last_name' => $last_name]);
        } else if ($phone != NULL) {
            $update_doctor = \App\Patient::query()
                    ->where('id', $id)
                    ->update(['phone' => $phone]);
        } else if ($gender != NULL) {
            $update_doctor = \App\Patient::query()
                    ->where('id', $id)
                    ->update(['gender' => $gender]);
        } else if ($birthday != NULL) {
            $update_doctor = \App\Patient::query()
                    ->where('id', $id)
                    ->update(['birthday' => $birthday]);
        } else if ($email != NULL) {
            $update_doctor = \App\Patient::query()
                    ->where('id', $id)
                    ->update(['email' => $email]);
        }

//        $update_patient = \App\Patient::query()
//                ->where('id', $id)
//                ->update(['last_name' => $request->input('last_name')]);
        $patient = \App\Patient::findOrFail($id);
        return response()->json($patient, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        \App\Patient::query()
                ->where('id', $id)->delete();
        $response = [
            'id' => $id,
        ];
        return response()->json($response, 201);
    }

}
