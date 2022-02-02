<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Appointment_item;
use App\Models\Dentist;
use App\Models\Patient;
use App\Models\Document;
use App\Models\Document_type;
use App\Models\Method_type;
use App\Models\Order_payment;
use App\Models\Payment_method_type;
use App\Models\Serie;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Appointment::where('estado',0);
        return view('citas.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('citas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->input('id');
        $appointment = Appointment::firstOrNew(['id' => $id]);
        $appointment->fill($request->all());
        $appointment->save();
        foreach ($request['item'] as $row)
        {
            // $doc->items()->create($row);
            $p_item = new Appointment_item;
            $p_item->fill($row);
            $p_item->appointment_id = $appointment->id;
            $p_item->save();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
    }

    public function tables(){
        $customers = Patient::all();
        $dentist = Dentist::all();
        return compact ( 'customers','dentist');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}
