<?php

namespace App\Http\Controllers;

use App\Models\TwDocumento;
use App\Http\Requests\StoreTwDocumentoRequest;
use App\Http\Requests\UpdateTwDocumentoRequest;

class TwDocumentoController extends Controller
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
     * @param  \App\Http\Requests\StoreTwDocumentoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTwDocumentoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TwDocumento  $twDocumento
     * @return \Illuminate\Http\Response
     */
    public function show(TwDocumento $twDocumento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TwDocumento  $twDocumento
     * @return \Illuminate\Http\Response
     */
    public function edit(TwDocumento $twDocumento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTwDocumentoRequest  $request
     * @param  \App\Models\TwDocumento  $twDocumento
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTwDocumentoRequest $request, TwDocumento $twDocumento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TwDocumento  $twDocumento
     * @return \Illuminate\Http\Response
     */
    public function destroy(TwDocumento $twDocumento)
    {
        //
    }
}
