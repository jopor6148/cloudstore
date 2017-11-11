<?php

namespace cloudstore\Http\Controllers\office\almacenes;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use cloudstore\Http\Controllers\Controller;
use cloudstore\Models\office\almacenes;
use cloudstore\Models\office\sucursale;
use cloudstore\Models\office\articulos;
use cloudstore\Models\office\inventarios;
use DB;

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

        if ($request->has("funcion")) {
          return $this->{$request->funcion}($request);
        }

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


    private function obtenerInventario($request){
      return view("office/inventarios/viewInventario",["datos"=>almacenes::where(["AlmacenID"=>$request->datos["almacen"]])->get()]);
    }


    private function seleccionIngreso($request){
      $almacen = $request->datos["almacen"];
      return view("office/almacenes/seleccionaIngresoAlmacen",compact(["almacen"]));
    }


    private function articulosFiltradosIngreso($request){

      $articulos = articulos::select("*");
      if(count($request->datos) > 0){
        foreach ($request->datos as $key => $value) {
          $cadena = explode(" ",$value);
          foreach ($cadena as $kc => $vc) {
            $articulos = $articulos->where($key,"like","%$vc%");
          }
        }
      }

      if (count($request->seleccionados) > 0) {
        foreach ($request->seleccionados as $key => $value) {
          $articulos = $articulos->where("ArticuloID","=",$key,"or");
        }
      }

      $articulos = $articulos->get();

      if (count($request->datos) <= 0 and count($request->seleccionados) <= 0) {
        $articulos=[];
      }

      return view("office/almacenes/articulosFiltradosIngreso",compact("articulos"));

    }



    private function formularioIngreso ($request){

      $almacen = $request->almacen;

      if(count( $request->datos) > 0){
        $articulos = articulos::select("*");
        foreach ($request->datos as $key => $value) {
            $articulos = $articulos->where("ArticuloID","=","$key","or");
        }
        $articulos = $articulos->get();
      }else{
        $articulos = [];
      }

      return view("office/almacenes/articulosIngresa",compact(["articulos","almacen"]));

    }



    private function ingresoAlmacen($request){

      $articulos = [];

      foreach ($request->datos["articulos"] as $key => $value) {
        $articulos[]=
        [
          "AlmacenID"=>(int)$request->datos["AlmacenID"],
          "ArticuloID"=>(int)$key,
          "Cantidad"=>$value["Cantidad"],
          "LoteID"=>$value["LoteID"],
          "PedimentoID"=>$value["PedimentoID"],
        ];
      }

      DB::connection('corecloudstore')->enableQueryLog();
      try {


        foreach ($articulos as $key => $value) {
          inventarios::create(
              $value
          );
        }

      } catch (QueryException $db) {

          return json_encode(
            [
              "error"=>true,
              "DBmessage"=>$db,
              "query"=>DB::connection("corecloudstore")->getQueryLog(),
              "datos"=>$articulos
            ]
          );

      }

      return json_encode(["error"=>false]);

    }

}
