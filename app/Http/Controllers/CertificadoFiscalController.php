<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCertificadoFiscalRequest;
use App\Http\Requests\UpdateCertificadoFiscalRequest;
use App\Models\CertificadoFiscal;

class CertificadoFiscalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCertificadoFiscalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCertificadoFiscalRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CertificadoFiscal  $certificadoFiscal
     * @return \Illuminate\Http\Response
     */
    public function show(CertificadoFiscal $certificadoFiscal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CertificadoFiscal  $certificadoFiscal
     * @return \Illuminate\Http\Response
     */
    public function edit(CertificadoFiscal $certificadoFiscal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCertificadoFiscalRequest  $request
     * @param  \App\Models\CertificadoFiscal  $certificadoFiscal
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCertificadoFiscalRequest $request, CertificadoFiscal $certificadoFiscal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CertificadoFiscal  $certificadoFiscal
     * @return \Illuminate\Http\Response
     */
    public function destroy(CertificadoFiscal $certificadoFiscal)
    {
        //
    }
}
