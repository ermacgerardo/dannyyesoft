<?php

namespace App\Http\Controllers;

use App\Models\TwContratoCorporativo;
use App\Http\Requests\StoreTwContratoCorporativoRequest;
use App\Http\Requests\UpdateTwContratoCorporativoRequest;
use App\Traits\GlobalTrait;
class TwContratoCorporativoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contratos = TwContratoCorporativo::all();
        $data['contratos_corporativo']=$contratos;
        $code=200;
        $exceptions=null;
        
        return GlobalTrait::responseJSON($data, $exceptions, $code);
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
     * @param  \App\Http\Requests\StoreTwContratoCorporativoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTwContratoCorporativoRequest $request)
    {
        $input = $request->all();
        
        $contrato_corporativo = TwContratoCorporativo::create($input);
        
        $data['contrato_corporativo']=$contrato_corporativo;
        $code=201;
        $exceptions=null;
        return GlobalTrait::responseJSON($data, $exceptions, $code);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TwContratoCorporativo  $twContratoCorporativo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contrato_corporativo = TwContratoCorporativo::find($id);
        
        $data['contrato_corporativo']=$contrato_corporativo;
        $code=200;
        $exceptions=null;
        return GlobalTrait::responseJSON($data, $exceptions, $code);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TwContratoCorporativo  $twContratoCorporativo
     * @return \Illuminate\Http\Response
     */
    public function edit(TwContratoCorporativo $twContratoCorporativo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTwContratoCorporativoRequest  $request
     * @param  \App\Models\TwContratoCorporativo  $twContratoCorporativo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTwContratoCorporativoRequest $request, $id)
    {
        $contrato_corporativo = TwContratoCorporativo::find($id);
        $contrato_corporativo->update($request->all());
        $data['contrato_corporativo']=$contrato_corporativo;
        $code=200;
        $exceptions=null;
        return GlobalTrait::responseJSON($data, $exceptions, $code);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TwContratoCorporativo  $twContratoCorporativo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contrato_corporativo = TwContratoCorporativo::find($id);
        $data['contrato_corporativo']=$contrato_corporativo;
        $contrato_corporativo->delete();
        $code=200;
        $exceptions=null;
        return GlobalTrait::responseJSON($data, $exceptions, $code);
    }
}
