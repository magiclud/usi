<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class DoctorController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $doctors = \App\Doctor::all();
//        return view('doctors.index', compact('doctors'));
        // return view('doctors.index', ['doctors' => $doctors]);
        return response()->json($doctors, 201);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {

//      return  response()->json([
//          'msg'=>'doctor created',
//          'post'=>[
//            'id' => $post->id ]
//        ],200);
        return response()->json();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request) {
        $doctor = new \App\Doctor();
        $doctor->speciality_id = $request->input('speciality_id');
        $doctor->first_name = $request->input('first_name');
        $doctor->last_name = $request->input('last_name');
        $doctor->phone = $request->input('phone');
        $doctor->gender = $request->input('gender');
        $doctor->birthday = $request->input('birthday');
        $doctor->email = $request->input('email');
        $doctor->room = $request->input('room');
        $doctor->save();

        $response = [
            'id' => $doctor->id
        ];
        return response()->json($response, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        $doctor = \App\Doctor::findOrFail($id);
        $response = [
            'speciality_id' => $doctor->SPECIALITY_id,
            'first_name' => $doctor->first_name,
            'last_name' => $doctor->last_name,
            'phone' => $doctor->phone,
            'gender' => $doctor->gender,
            'birthday' => $doctor->birthday,
            'email' => $doctor->email,
            'room' => $doctor->room
        ];
        return response()->json($response, 201);
    }

    public function read_appointments($id) {
        $doctors_meetings = \App\Appointment::where('DOCTOR_id', $id)->get();
        return response()->json($doctors_meetings, 201);
    }

    public function read_appointment($doctor_id, $appointment_id) {
        $doctors_meeting = \App\Appointment::query()
                        ->where('DOCTOR_id', $doctor_id)
                        ->where('id', $appointment_id)->first();
        return response()->json($doctors_meeting, 201);
    }

    public function doctors_by_speciality($spec_id) {
        $doctors_spec = \App\Doctor::where('SPECIALITY_id', $spec_id)->get();
        return response()->json($doctors_spec, 201);
    }

    public function doctor_appointments_by_date(Request $request, $id) {
        $doctors_meeting = \App\Appointment::query()
                        ->where('DOCTOR_id', $id)
                        ->whereDate('date', '=', $request->input('date'))->get();
        return response()->json($doctors_meeting, 201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id) {

        $speciality_id = $request->input('speciality_id');
        $SPECIALITY_id = $request->input('SPECIALITY_id');
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $phone = $request->input('phone');
        $gender = $request->input('gender');
        $birthday = $request->input('birthday');
        $email = $request->input('email');
        $room = $request->input('room');

        if ($SPECIALITY_id != NULL) {
            $update_doctor = \App\Doctor::query()
                    ->where('id', $id)
                    ->update(['SPECIALITY_id' => $SPECIALITY_id]);
        } else if ($speciality_id != NULL) {
            $update_doctor = \App\Doctor::query()
                    ->where('id', $id)
                    ->update(['SPECIALITY_id' => $speciality_id]);
        } else if ($first_name != NULL) {
            $update_doctor = \App\Doctor::query()
                    ->where('id', $id)
                    ->update(['first_name' => $first_name]);
        } else if ($last_name != NULL) {
            $update_doctor = \App\Doctor::query()
                    ->where('id', $id)
                    ->update(['last_name' => $last_name]);
        } else if ($phone != NULL) {
            $update_doctor = \App\Doctor::query()
                    ->where('id', $id)
                    ->update(['phone' => $phone]);
        } else if ($gender != NULL) {
            $update_doctor = \App\Doctor::query()
                    ->where('id', $id)
                    ->update(['gender' => $gender]);
        } else if ($birthday != NULL) {
            $update_doctor = \App\Doctor::query()
                    ->where('id', $id)
                    ->update(['birthday' => $birthday]);
        } else if ($email != NULL) {
            $update_doctor = \App\Doctor::query()
                    ->where('id', $id)
                    ->update(['email' => $email]);
        } else if ($room != NULL) {
            $update_doctor = \App\Doctor::query()
                    ->where('id', $id)
                    ->update(['room' => $room]);
        }
        $doctor = \App\Doctor::findOrFail($id);
        return response()->json($doctor, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        \App\Doctor::query()
                ->where('id', $id)->delete();
        $response = [
            'id' => $id,
        ];
        return response()->json($response, 201);
    }

}
