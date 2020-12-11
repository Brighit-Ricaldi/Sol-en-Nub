<?php

namespace App\Http\Controllers;

use App\Contactos;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class ContactosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['contactos']=Contactos::paginate(5);
        return view('contactos.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contactos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $campos=[
            'Nombre' =>'required|string|max:100',
            'Apellido' =>'required|string|max:100',
            'Email' =>'required|email',
            'Celular' =>'required|string|max:100',
            'Foto' =>'required|max:10000|mimes:jpeg,png,jpg'
        ]; 
        $mensaje=["required"=>'El campo es requerido']; 
        $this->validate($request,$campos,$mensaje);     
        //$datosContactos=request()->all();
        $datosContactos=request()->except('_token');
        if($request->hasFile('Foto')){
            $datosContactos['Foto']=$request->file('Foto')->store('uploads','public');
        }
        Contactos::insert($datosContactos);
        //return response()->json($datosContactos);
        return redirect('contactos')->with('Mensaje', 'Contacto agregado con exito');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contactos  $contactos
     * @return \Illuminate\Http\Response
     */
    public function show(Contactos $contactos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contactos  $contactos
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        //
        $contacto= Contactos::findOrFail($id);
        return view('contactos.edit', compact('contacto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contactos  $contactos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id )
    {
        //

        $datosContactos=request()->except(['_token', '_method']);
        
        if($request->hasFile('Foto')){

            $contacto= Contactos::findOrFail($id);

            Storage::delete('public/'. $contacto->Foto);
            $datosContactos['Foto']=$request->file('Foto')->store('uploads','public');
        }

        Contactos::where('id', '=', $id)->update($datosContactos);
        
        //$contacto= Contactos::findOrFail($id);
        //return view('contactos.edit', compact('contacto'));
        return redirect('contactos')->with('Mensaje', 'Contacto modificado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contactos  $contactos
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
        $contacto= Contactos::findOrFail($id);

        if(Storage::delete('public/'. $contacto->Foto)){
            Contactos::destroy($id);
        }
        
        return redirect('contactos')->with('Mensaje', 'Contacto eliminado con exito');
    }
}
