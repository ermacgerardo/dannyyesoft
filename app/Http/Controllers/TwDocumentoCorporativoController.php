<?php

namespace App\Http\Controllers;

use App\Models\TwDocumentoCorporativo;
use App\Http\Requests\StoreTwDocumentoCorporativoRequest;
use App\Http\Requests\UpdateTwDocumentoCorporativoRequest;
use App\Traits\GlobalTrait;
class TwDocumentoCorporativoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documentos = TwDocumentoCorporativo::all();
        $data['documentos_corporativo']=$documentos;
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
     * @param  \App\Http\Requests\StoreTwDocumentoCorporativoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTwDocumentoCorporativoRequest $request)
    {
        $input = $request->all();
        
        $documento_corporativo = TwDocumentoCorporativo::create($input);
        
        $data['documento_corporativo']=$documento_corporativo;
        $code=201;
        $exceptions=null;
        return GlobalTrait::responseJSON($data, $exceptions, $code);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TwDocumentoCorporativo  $twDocumentoCorporativo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $documento_corporativo = TwDocumentoCorporativo::find($id);
        
        $data['documento_corporativo']=$documento_corporativo;
        $code=200;
        $exceptions=null;
        return GlobalTrait::responseJSON($data, $exceptions, $code);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TwDocumentoCorporativo  $twDocumentoCorporativo
     * @return \Illuminate\Http\Response
     */
    public function edit(TwDocumentoCorporativo $twDocumentoCorporativo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTwDocumentoCorporativoRequest  $request
     * @param  \App\Models\TwDocumentoCorporativo  $twDocumentoCorporativo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTwDocumentoCorporativoRequest $request, $id)
    {
        $documento_corporativo = TwDocumentoCorporativo::find($id);
        $documento_corporativo->update($request->all());
        $data['documento_corporativo']=$documento_corporativo;
        $code=200;
        $exceptions=null;
        return GlobalTrait::responseJSON($data, $exceptions, $code);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TwDocumentoCorporativo  $twDocumentoCorporativo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $documento_corporativo = TwDocumentoCorporativo::find($id);
        $data['documento_corporativo']=$documento_corporativo;
        $documento_corporativo->delete();
        $code=200;
        $exceptions=null;
        return GlobalTrait::responseJSON($data, $exceptions, $code);
    }
}
