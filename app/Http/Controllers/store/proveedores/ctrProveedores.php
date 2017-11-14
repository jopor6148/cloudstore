<?php

namespace cloudstore\Http\Controllers\store\proveedores;

use Illuminate\Http\Request;
use cloudstore\Http\Controllers\Controller;
use cloudstore\Models\store\Proveedores;
use Illuminate\Database\QueryException;

class ctrProveedores extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedores = proveedores::get();
        return view("store/proveedores/viewProveedores",compact(["proveedores"]));
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
        if ($request ->has("fcn")) {
          if (method_exists($this, $request->fcn)) {
            return $this->{$request->fcn}($request);
          }else{
            return redirect()->back()->withErrors(["Error en el Proceso"]);
          }
        }

        if ($request->has("ProveedorID")) {

          $proveedor = proveedores::where("ProveedorID","=",$request->ProveedorID)->get();

          return view("store/proveedores/viewInfoProveedor",compact(["proveedor"]));

        }

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



    private function altaProveedor($request){

      $datoProveedor = [
        "Nombre"=>$request->Nombre,
        "Correo"=>$request->Correo,
        "Telefono1"=>$request->Telefono1,
        "Telefono2"=>$request->Telefono2,
        "Direccion1"=>$request->Direccion1,
        "Direccion2"=>$request->Direccion2,
        "Ciudad"=>$request->Ciudad,
        "Estado"=>$request->Estado,
        "CP"=>$request->CP,
        "Pais"=>$request->Pais,
        "Descripcion"=>$request->Descripcion,
      ];

      try {
        proveedores::create($datoProveedor);
      } catch (QueryException $e) {
          $error =$e->getPrevious();
          return redirect()->back()->withErrors([$error->errorInfo[2]]);
      }

      return redirect()->back()->with(['mensaje'=>['Alta de Proveedor '.$request->Nomnre]]);


    }




}
