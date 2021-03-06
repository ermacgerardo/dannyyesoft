<?php

namespace App\Http\Controllers;

use App\Models\TwDocumento;
use App\Http\Requests\StoreTwDocumentoRequest;
use App\Http\Requests\UpdateTwDocumentoRequest;
use App\Traits\GlobalTrait;
class TwDocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documentos = TwDocumento::all();
        $data['documentos']=$documentos;
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
     * @param  \App\Http\Requests\StoreTwDocumentoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTwDocumentoRequest $request)
    {
        $input = $request->all();
        
        $documento = TwDocumento::create($input);
        
        $data['documento']=$documento;
        $code=201;
        $exceptions=null;
        return GlobalTrait::responseJSON($data, $exceptions, $code);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TwDocumento  $twDocumento
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $documento = TwDocumento::find($id);
        
        $data['documento']=$documento::where('id','=',$id)
                ->with("twDocumentosCorporativo")
                ->first();;
        $code=200;
        $exceptions=null;
        return GlobalTrait::responseJSON($data, $exceptions, $code);
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
    public function update(UpdateTwDocumentoRequest $request, $id)
    {
        $documento = TwDocumento::find($id);
        $documento->update($request->all());
        $data['documento']=$documento;
        $code=200;
        $exceptions=null;
        return GlobalTrait::responseJSON($data, $exceptions, $code);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TwDocumento  $twDocumento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $documento = TwDocumento::find($id);
        $data['documento']=$documento;
        $documento->delete();
        $code=200;
        $exceptions=null;
        return GlobalTrait::responseJSON($data, $exceptions, $code);
    }
}
