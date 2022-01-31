<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Document;
use App\Models\Document_type;
use App\Models\Method_type;
use App\Models\Payment_method_type;
use App\Models\Order_payment;
use App\Models\Appointment;
use App\Models\Currency_type;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\Serie;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('documents.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('documents.create');
    }

    public function citas(){
        return view('reports.citas');
    }

    public function cita(){
        $records = Appointment::where('estado',0)->get();
        return compact('records');
    }

    public function tables(){
        $customers = Patient::all();
        $series = Serie::all();
        $payment_method_types = Payment_method_type::all();
        $method_types = Method_type::all();
        $document_types = Document_type::all();
        $currency_types = Currency_type::all();
        return compact ( 'customers','currency_types','series','payment_method_types','method_types','document_types');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function order(){
        return view('reports.orders');
    }
    public function pdf(Request $request) {

        $order = Order_payment::all();        
        
        $pdf = PDF::loadView('reports.orders_pdf', compact("order"));

        $filename = 'Reporte_Orden_Pagos'.date('YmdHis');

        return $pdf->setPaper('a4', 'landscape')->download($filename.'.pdf');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        //
    }
}
