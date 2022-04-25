<?php

namespace App\Http\Controllers;

use App\Models\TwEmpresaCorporativo;
use App\Http\Requests\StoreTwEmpresaCorporativoRequest;
use App\Http\Requests\UpdateTwEmpresaCorporativoRequest;
use App\Traits\GlobalTrait;
class TwEmpresaCorporativoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = TwEmpresaCorporativo::all();
        $data['empresas_corporativo']=$empresas;
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
     * @param  \App\Http\Requests\StoreTwEmpresaCorporativoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTwEmpresaCorporativoRequest $request)
    {
        $input = $request->all();
        
        $empresa_corporativo = TwEmpresaCorporativo::create($input);
        
        $data['empresa_corporativo']=$empresa_corporativo;
        $code=201;
        $exceptions=null;
        return GlobalTrait::responseJSON($data, $exceptions, $code);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TwEmpresaCorporativo  $twEmpresaCorporativo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empresa_corporativo = TwEmpresaCorporativo::find($id);
        
        $data['empresa_corporativo']=$empresa_corporativo;
        $code=200;
        $exceptions=null;
        return GlobalTrait::responseJSON($data, $exceptions, $code);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TwEmpresaCorporativo  $twEmpresaCorporativo
     * @return \Illuminate\Http\Response
     */
    public function edit(TwEmpresaCorporativo $twEmpresaCorporativo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTwEmpresaCorporativoRequest  $request
     * @param  \App\Models\TwEmpresaCorporativo  $twEmpresaCorporativo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTwEmpresaCorporativoRequest $request, $id)
    {
        $empresa_corporativo = TwEmpresaCorporativo::find($id);
        $empresa_corporativo->update($request->all());
        $data['empresa_corporativo']=$empresa_corporativo;
        $code=200;
        $exceptions=null;
        return GlobalTrait::responseJSON($data, $exceptions, $code);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TwEmpresaCorporativo  $twEmpresaCorporativo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empresa_corporativo = TwEmpresaCorporativo::find($id);
        $data['empresa_corporativo']=$empresa_corporativo;
        $empresa_corporativo->delete();
        $code=200;
        $exceptions=null;
        return GlobalTrait::responseJSON($data, $exceptions, $code);
    }
}
