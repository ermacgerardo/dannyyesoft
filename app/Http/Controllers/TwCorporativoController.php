<?php

namespace App\Http\Controllers;

use App\Models\TwCorporativo;
use App\Http\Requests\StoreTwCorporativoRequest;
use App\Http\Requests\UpdateTwCorporativoRequest;

class TwCorporativoController extends Controller
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
     * @param  \App\Http\Requests\StoreTwCorporativoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTwCorporativoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TwCorporativo  $twCorporativo
     * @return \Illuminate\Http\Response
     */
    public function show(TwCorporativo $twCorporativo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TwCorporativo  $twCorporativo
     * @return \Illuminate\Http\Response
     */
    public function edit(TwCorporativo $twCorporativo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTwCorporativoRequest  $request
     * @param  \App\Models\TwCorporativo  $twCorporativo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTwCorporativoRequest $request, TwCorporativo $twCorporativo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TwCorporativo  $twCorporativo
     * @return \Illuminate\Http\Response
     */
    public function destroy(TwCorporativo $twCorporativo)
    {
        //
    }
}
