<?php

namespace App\Http\Controllers;

use App\nota;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Nota::all();
        return response()->json(
            [
                "message" => "Operación realizada con éxito",
                "data" => $data
            ]
        );
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nota = new Nota;
        $nota->titulo = $request->titulo;
        $nota->autor = $request->autor;
        $nota->fecha = $request->fecha;
        $nota->cuerpo = $request->cuerpo;
        $nota->clasificacion = $request->clasificacion;

        $nota->save();

        return response()->json(
            [
                "message" => "Operación realizada con éxito",
                "data" => $nota
            ]
            );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Nota::where('id', $id)->first();

        if($data) {
            return response()->json(
                [
                    "message" => "Operación realizada con éxito",
                    "data" => $data
                ]
            );
        }

        return response()->json(
            [
                "message" => "No se encontró el elemento con id=" . $id,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $nota = Nota::where('id', $id)->first();
        if($nota){
            $nota->titulo = $request->titulo ? $request->titulo : $nota->titulo;
            $nota->autor = $request->autor ? $request->autor : $nota->autor;
            $nota->fecha = $request->fecha ? $request->fecha : $nota->fecha;
            $nota->cuerpo = $request->cuerpo ? $request->cuerpo : $nota->cuerpo;
            $nota->clasificacion = $request->clasificacion ? $request->calificacion : $nota->calificacion;

            $nota->save();
            return response()->json(
                [
                    "message" => "Operación realizada con éxito",
                    "data" => $nota
                ]
            );
        }
        return response()->json(
            [
                "message" => "No se encontró el elemento con id=" . $id,
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Product::where('id', $id)->first();

        if($data) {
            $data->delete();
            return response()->json(
                [
                    "message" => "Operación realizada con éxito"
                ]
            );
        }

        return response()->json(
            [
                "message" => "No se encontró el elemento con id=" . $id,
            ]
        );
    }
}
