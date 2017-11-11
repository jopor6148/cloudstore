<?php

namespace cloudstore\Http\Controllers\office\branches;

use Illuminate\Http\Request;
use cloudstore\Http\Controllers\Controller;
use cloudstore\Models\office\sucursale;
use cloudstore\Models\office\almacenes;
use Carbon\Carbon;
use Auth;
use Gate;
use Illuminate\Database\QueryException;
use DB;

class ctrBranches extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sucursales = sucursale::where(['Estatus'=>1])->get();
        // $sucursales->paginate(10);
        return view('office/branches.viewSucursales',compact('sucursales'));
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

      if ($request->has("funcion")) {
        return $this->{$request->funcion}($request);
      } else {
        //
        try {

          $resSucursal = sucursale::create(
            [
              'NombreSucursal'=>$request->Nombre,
              "Direccion"=>"",
              "Ciudad"=>"",
              "Estado"=>"",
              "CP"=>"",
              "Pais"=>"",
              "Descripcion"=>"",
              "Estatus"=>1,
            ]
          );

          try {

            $id = $resSucursal->id;
            almacenes::create(
              [
                'SucursalID'=>$id,
                'NombreAlmacen'=>'Principal',
                'Estatus'=>'1',
                'TipoAlmacen'=>'1',
              ]
            );

          } catch (QueryException $db) {

              return redirect()->back()->withErrors(["Problea al generar almacen pricipal para sucursal \n ".json_encode($db)]);

          }

        } catch (QueryException $db) {

          return redirect()->back()->withErrors(["Problea al generar Sucursal \n ".json_encode($db)]);

        }


        return redirect()->back()->with('respuesta',['Sucursal creada']);
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


    private function obtenerAlmacen ($request)
    {

      // DB::connection('corecloudstore')->enableQueryLog();
      // dump($request->input());
      $almacenes=almacenes::where("Estatus",1);
      $almacenes->where('SucursalID', $request->datos["sucursal"]);
      $almacenes = $almacenes->get();
      $sucursal = $request->datos["sucursal"];
      // dump(DB::connection("corecloudstore")->getQueryLog());
      return view('office/almacenes.viewAlmacenes',compact(['almacenes',"sucursal"]));

    }


}
