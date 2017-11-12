<?php

namespace cloudstore\Http\Controllers\office\articulos;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use cloudstore\Http\Controllers\Controller;
use cloudstore\Models\office\articulos;
use cloudstore\Models\office\pedimentos;
use cloudstore\Models\office\lotes;

class ctrArticulos extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articulos = articulos::get();

        return view("office/articulos/viewArticulos",compact(["articulos"]));
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
        if ($request->has("fcn")) {
          if (!method_exists($this,$request->fcn)) {
            return redirect()->back();
          }

          return $this->{$request->fcn}($request);

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



    //


    private function altaArticulo($request){

      $datosAriculos =[
        "Codigo"=>$request->Codigo,
        "Descripcion"=>$request->Descripcion,
        "Costo"=>$request->Costo,
        "PrecioMayoreo"=>"$request->PrecioMayoreo",
        "PrecioMenudeo"=>$request->PrecioMenudeo,
      ];

      try {

        articulos::create(
          $datosAriculos
        );


      } catch (QueryException $e) {
        $error =$e->getPrevious();
        return redirect()->back()->withErrors([$error->errorInfo[2]]);
      }

      return redirect()->back()->with(['mensaje'=>['Alta de articulo '.$request->Codigo]]);

    }



    private function altaPedimento($request){

      $datosPedimento = [
        "Numero"=>$request->Numero,
        "FechaEntrada"=>$request->FechaEntrada,
      ];


      try {

        pedimentos::create(
          $datosPedimento
        );


      } catch (QueryException $e) {
        $error =$e->getPrevious();
        return redirect()->back()->withErrors([$error->errorInfo[2]]);
      }

      return redirect()->back()->with(['mensaje'=>['Alta de pedimeto '.$request->Numero]]);

    }



    private function altalote($request){

      $datosLote = [
        "Numero"=>$request->Numero,
        "FechaEntrada"=>$request->FechaEntrada,
        "FechaCaducidad"=>$request->FechaCaducidad,
      ];


      try {

        lotes::create(
          $datosLote
        );


      } catch (QueryException $e) {
        $error =$e->getPrevious();
        return redirect()->back()->withErrors([$error->errorInfo[2]]);
      }

      return redirect()->back()->with(['mensaje'=>['Alta de lote '.$request->Numero]]);

    }



}
