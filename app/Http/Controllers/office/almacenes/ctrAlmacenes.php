<?php

namespace cloudstore\Http\Controllers\office\almacenes;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use cloudstore\Http\Controllers\Controller;
use cloudstore\Models\office\almacenes;
use cloudstore\Models\office\sucursale;

class ctrAlmacenes extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $almacenes=almacenes::where(['Estatus'=>1])->get();
        return view('office/almacenes.viewAlmacenes',compact('almacenes'));
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
    public function store(Request $request)
    {
        $val=$request->validate([
          "SucursalID"=>["required"],
        ]);

        try {


          almacenes::create(
            [
              'SucursalID'=>$request->SucursalID,
              'NombreAlmacen'=>$request->Nombre,
              'Estatus'=>'1',
              'TipoAlmacen'=>'0',
            ]
          );

        } catch (QueryException $db) {

            return redirect()->back()->withErrors(["Problea al generar almacen  \n ".json_encode($db)]);

        }

        return redirect()->back()->with('respuesta',['Almacen creado']);
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
