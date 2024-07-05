<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePacServicioRequest;
use App\Http\Requests\UpdatePacServicioRequest;
use App\Models\PacServicio;

class PacServicioController extends Controller
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
     * @param  \App\Http\Requests\StorePacServicioRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePacServicioRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PacServicio  $pacServicio
     * @return \Illuminate\Http\Response
     */
    public function show(PacServicio $pacServicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PacServicio  $pacServicio
     * @return \Illuminate\Http\Response
     */
    public function edit(PacServicio $pacServicio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePacServicioRequest  $request
     * @param  \App\Models\PacServicio  $pacServicio
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePacServicioRequest $request, PacServicio $pacServicio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PacServicio  $pacServicio
     * @return \Illuminate\Http\Response
     */
    public function destroy(PacServicio $pacServicio)
    {
        //
    }
}
