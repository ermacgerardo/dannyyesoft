<?php

namespace App\Http\Controllers;

use App\Models\TwCorporativo;
use App\Http\Requests\StoreTwCorporativoRequest;
use App\Http\Requests\UpdateTwCorporativoRequest;
use Exception;
use App\Traits\GlobalTrait;
//use Laravel\Passport\Passport;
class TwCorporativoController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $corporativos = TwCorporativo::all();
        $data['corporativos']=$corporativos;
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
     * @param  \App\Http\Requests\StoreTwCorporativoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTwCorporativoRequest $request)
    {
        //
        $input = $request->all();
        
        $corporativo = TwCorporativo::create($input);
        
        $data['corporativo']=$corporativo;
        $code=201;
        $exceptions=null;
        return GlobalTrait::responseJSON($data, $exceptions, $code);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TwCorporativo  $twCorporativo
     * @return \Illuminate\Http\Response
     */
    //public function show(TwCorporativo $twCorporativo)
    public function show($id)
    {
        
        $corporativo = TwCorporativo::where('id','=',$id)
                ->with("twEmpresasCoporativo")
                ->with("twContactosCorporativo")
                ->with("twContratosCorporativo")
                ->with("twDocumentosCorporativo")
                ->first();
        //$data['corporativo']=$corporativo->first()->with("twDocumentosCcorporativo")->get();
        //$corporativo = TwCorporativo::find($id);
        $data['corporativo']=$corporativo;
        
        $code=200;
        $exceptions=null;
        return GlobalTrait::responseJSON($data, $exceptions, $code);
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
    public function update(UpdateTwCorporativoRequest $request, $id)
    {
        $corporativo = TwCorporativo::find($id);
        $corporativo->update($request->all());
        $data['corporativo']=$corporativo;
        $code=200;
        $exceptions=null;
        return GlobalTrait::responseJSON($data, $exceptions, $code);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TwCorporativo  $twCorporativo
     * @return \Illuminate\Http\Response
     */
    //public function destroy(TwCorporativo $twCorporativo)
    public function destroy($id)
    {
        
        $corporativo = TwCorporativo::find($id);
        $data['corporativo']=$corporativo;
        $corporativo->delete();
        $code=200;
        $exceptions=null;
        return GlobalTrait::responseJSON($data, $exceptions, $code);
    }
}
