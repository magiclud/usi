<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class SpecialityController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $speciality = \App\Speciality::all();
        return response()->json($speciality, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {

        $speciality = \App\Speciality::findOrFail($id);
        $response = [
            'id' => $speciality->id,
            'name' => $speciality->name,
            'price_per_appointment' => $speciality->price_per_appointment
        ];

        return response()->json($response, 201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        // $update_speciality = \App\Speciality::where('id', $id)->get();
        $update_speciality = \App\Speciality::query()
                ->where('id', $id)
                ->update(['price_per_appointment' => $request->input('price_per_appointment')]);
        $speciality = \App\Speciality::findOrFail($id);
        return response()->json($speciality, 201);
    }

}
