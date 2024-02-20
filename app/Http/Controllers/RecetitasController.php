<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\recetitas; 
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class RecetitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $recetitas = DB::table('recetitas')->get();
        return view('recetitas.recetitas',['recetitas'=>$recetitas]);
    }
    /**hola//**

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recetitas.recetitas');    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        recetitas::create($request->all());
        return redirect()->route('recetitas.index')
            ->with('Completado', 'Contact Form creado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(recetitas $recetitas)
    {
        $recetitas = recetitas::find($id);
        return view('recetitas.edit', compact('recetitas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(recetitas $recetitas)
    {
        $request->validate([
            'nombre'=> 'required',
            'mail'=> 'required',
            'telefono'=> 'required',
            'comentario'=>'not required',
        ]);
        $recetitas = recetitas::find($id);
        $recetitas->update($request->all());
        return redirect()->route('recetitas.index')
           
            ->with('Completado', 'Contact Form actualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(recetitas $recetitas)
    {
        $recetitas = recetitas::find($id);
        $recetitas->delete();
        return redirect()->route('recetitas.index')
            
            ->with('Completado', 'Contact Form eliminado!');
    }
}
