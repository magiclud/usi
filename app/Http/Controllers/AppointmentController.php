<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class AppointmentController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $appointment = [
            'id' => 'id',
            'doctor_id' => 'doctor_id',
            'patient_id' => 'patient_id',
            'date' => 'date',
            'duration' => 'duratio',
            'read_meeting' => [
                'href' => 'app.usi/appointment/1',
                'method' => 'GET'
            ]
        ];

        $response = [
            'msg' => 'List of all Appointments from index method',
            'meetings' => [
                $appointment,
                $appointment
            ]
        ];
        return response()->json($response, 200);
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
        $doctor_id = $request->input('doctor_id');
        $patient_id = $request->input('patient_id');
        $date = $request->input('date');
        $duration = $request->input('duration');

        $appointment = [
            'doctor_id' => $doctor_id,
            'patient_id' => $patient_id,
            'date' => $date,
            'duration' => $duration,
            'read_appointment' => [
                'href' => 'app.usi/appointment/1',
                'method' => 'GET'
            ]
        ];

        $response = [
            'msg' => 'Appointment created in store',
            'appointment' => $appointment
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
        $appointment = [
            'id' => 'id',
            'doctor_id' => 'doctor_id',
            'patient_id' => 'patient_id',
            'date' => 'date',
            'duration' => 'duratio',
            'read_meeting' => [
                'href' => 'app.usi/appointment',
                'method' => 'GET'
            ]
        ];

        $response = [
            'msg' => 'Appointment from show method',
            'meetings' => $appointment
        ];
        return response()->json($response, 200);
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
        $doctor_id = $request->input('doctor_id');
        $patient_id = $request->input('patient_id');
        $date = $request->input('date');
        $duration = $request->input('duration');
        $appointment = [
            'doctor_id' => $doctor_id,
            'patient_id' => $patient_id,
            'date' => $date,
            'duration' => $duration,
            'read_appointment' => [
                'href' => 'app.usi/appointment/1',
                'method' => 'GET'
            ]
        ];

        $response = [
            'msg' => 'Appointment updated',
            'appointment' => $appointment
        ];

        return response()->json($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $response = [
            'msg' => 'Appointment deleted',
            'create' => [
                'href' => 'app.usi/appointment',
                'method' => 'POST',
                'params' => 'doctor_id', 'patient_id', 'date', 'duration'
            ]
        ];
    }

}
