<?php

namespace App\Http\Controllers;

use App\Models\Archivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
// validaciones
use App\Http\Requests\ArchivoEditRequest;
use App\Http\Requests\ArchivoStoreRequest;

class ArchivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index',[
            'archivos' => Archivo::latest('updated_at')->get()
        ]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArchivoStoreRequest $request)
    {
        $archivo =  File::get($request['archivo']);
        // $aver = array($archivo);
        $total = preg_split('/(,)/', $archivo);
        $array = [];
        $array['email'] = $total[0];
        $array['nombre'] = $total[1];
        $array['apellido'] = $total[2];
        $array['codigo'] = $total[3];
       
        if($array['codigo'] < 1 || $array['codigo'] > 3){
            return back()->with("danger","Error al procesar archivo, el código debe estar entre 1 y 3");
        }elseif($array['email'] == null){
            return back()->with("danger","Error al procesar archivo, el email es obligatorio");
        }else{
            Archivo::create($array);
            return back()->with("status","Registro creado con éxito");
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Archivo  $archivo
     * @return \Illuminate\Http\Response
     */
    public function show(Archivo $archivo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Archivo  $archivo
     * @return \Illuminate\Http\Response
     */
    public function edit(Archivo $archivo)
    {
        return view('edit',[
            'archivo' => Archivo::findOrFail($archivo->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Archivo  $archivo
     * @return \Illuminate\Http\Response
     */
    public function update(ArchivoEditRequest $request, Archivo $archivo)
    {
        $registro = Archivo::findOrFail($archivo->id);
        // return $request->codigo;
        if($request->codigo > 3 || $request->codigo < 0){
            return back()->with("danger","El código debe estar entre 1 y 3");
        }else{
            $registro->update($request->all());
            return redirect('archivo')->with("status","Registro actualizado con éxito");
        }
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Archivo  $archivo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Archivo $archivo)
    {
        $registro = Archivo::findOrFail($archivo->id);
        $registro->delete();
        return redirect('archivo')->with("status","Registro eliminado con éxito");
    }
}
