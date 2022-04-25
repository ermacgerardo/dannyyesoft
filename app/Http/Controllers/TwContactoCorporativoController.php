<?php

namespace App\Http\Controllers;

use App\Models\TwContactoCorporativo;
use App\Http\Requests\StoreTwContactoCorporativoRequest;
use App\Http\Requests\UpdateTwContactoCorporativoRequest;
use App\Traits\GlobalTrait;
class TwContactoCorporativoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contactos = TwContactoCorporativo::all();
        $data['contactos_corporativo']=$contactos;
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
     * @param  \App\Http\Requests\StoreTwContactoCorporativoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTwContactoCorporativoRequest $request)
    {
        $input = $request->all();
        
        $contacto_corporativo = TwContactoCorporativo::create($input);
        
        $data['contacto_corporativo']=$contacto_corporativo;
        $code=201;
        $exceptions=null;
        return GlobalTrait::responseJSON($data, $exceptions, $code);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TwContactoCorporativo  $twContactoCorporativo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contacto_corporativo = TwContactoCorporativo::find($id);
        
        $data['contacto_corporativo']=$contacto_corporativo;
        $code=200;
        $exceptions=null;
        return GlobalTrait::responseJSON($data, $exceptions, $code);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TwContactoCorporativo  $twContactoCorporativo
     * @return \Illuminate\Http\Response
     */
    public function edit(TwContactoCorporativo $twContactoCorporativo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTwContactoCorporativoRequest  $request
     * @param  \App\Models\TwContactoCorporativo  $twContactoCorporativo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTwContactoCorporativoRequest $request, $id)
    {
        $contacto_corporativo = TwContactoCorporativo::find($id);
        $contacto_corporativo->update($request->all());
        $data['contacto_corporativo']=$contacto_corporativo;
        $code=200;
        $exceptions=null;
        return GlobalTrait::responseJSON($data, $exceptions, $code);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TwContactoCorporativo  $twContactoCorporativo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contacto_corporativo = TwContactoCorporativo::find($id);
        $data['contacto_corporativo']=$contacto_corporativo;
        $contacto_corporativo->delete();
        $code=200;
        $exceptions=null;
        return GlobalTrait::responseJSON($data, $exceptions, $code);
    }
}
