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
use Illuminate\Support\Facades\DB;
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

        DB::connection('pgsql')->transaction(function () use ($request) {
            $value = [
                'date_of_treatment' => $request['date_of_treatment'],
                'start_time' => $request['start_time'],
                'end_time' => $request['end_time'],
                'description' => $request['description'],
                'monto' => $request['monto'],
                'patient_id' => $request['patient_id'],
                'dentist_id' => $request['dentist_id'],
            ];
            $this->Appointment = Appointment::create($value);

            foreach ($request['item'] as $row)
            {
                //$this->Appointment->items()->create($row);
                $id = [];
                $value2 = [
                    'appointment_id' => $this->Appointment->id,
                    'item_id' => $row['item_id'],
                    // 'item' => [
                    //     'amount_plastic_bag_taxes' => $row['item']['amount_plastic_bag_taxes'],
                    //     'currency_type_id' => $row['item']['currency_type_id'],
                    //     'date_of_due' => $row['item']['date_of_due'],
                    //     'description' => $row['item']['description'],
                    //     'has_igv' => $row['item']['has_igv'],
                    //     'has_isc' => $row['item']['has_isc'],
                    //     'has_plastic_bag_taxes' => $row['item']['has_plastic_bag_taxes'],
                    //     'id' => $row['item']['id'],
                    //     'model' => $row['item']['model'],
                    //     'name' => $row['item']['name'],
                    //     'purchase_affectation_igv_type_id' => $row['item']['purchase_affectation_igv_type_id'],
                    //     'purchase_unit_price' => $row['item']['purchase_unit_price'],
                    //     'sale_affectation_igv_type_id' => $row['item']['sale_affectation_igv_type_id'],
                    //     'sale_unit_price' => $row['item']['sale_unit_price'],
                    //     'status' => $row['item']['status'],
                    //     'stock' => $row['item']['stock'],
                    //     'stock_min' => $row['item']['stock_min'],
                    //     'suggested_price' => $row['item']['suggested_price'],
                    //     'unit_type_id' => $row['item']['unit_type_id'],
                    //     'warehouse_id' => $row['item']['warehouse_id'],
                        
                    // ],
                    'quantity' => $row['quantity'],
                    'unit_value' => $row['unit_value'],
                    'affectation_igv_type_id' => $row['affectation_igv_type_id'],
                    'total_base_igv' => $row['total_base_igv'],
                    'percentage_igv' => $row['percentage_igv'],
                    'total_igv' => $row['total_igv'],
                    'total_base_isc' => $row['total_base_isc'],
                    'percentage_isc' => $row['percentage_isc'],
                    'total_isc' => $row['total_isc'],
                    'total_base_other_taxes' => $row['total_base_other_taxes'],
                    'percentage_other_taxes' => $row['percentage_other_taxes'],
                    'total_other_taxes' => $row['total_other_taxes'],
                    'total_taxes' => $row['total_taxes'],
                    'unit_price' => $row['unit_price'],
                    'total_value' => $row['total_value'],
                    'total_charge' => $row['total_charge'],
                    'total_discount' => $row['total_discount'],
                    'total' => $row['total'],
                ];
                $this->Appointment_item = Appointment_item::create($value2);
            }
            
        });
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
