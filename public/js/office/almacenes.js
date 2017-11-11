var articulosSeleccionados = {};

// funcion para sintetizar los envios de Post o Get

var send = function(type){

  if (type == "post") {
    $.post(objSend.url,objSend.data,"",objSend.type)
    .done(function(data){
      return data;
    })
    .fail(function(){
      alert("Error conexión");
    });
  }else{
    $.get(objSend.url,objSend.data,"",objSend.type)
    .done(function(data){
      return data;
    })
    .fail(function(){
      alert("Error conexión");
    });
  }

};


// obtiene el inventario del almacen seleccionado


var obtenerInventario = function(almacen){

  if (almacen == undefined) {
    return;
  }

  objSend.url = location.origin+"/office/almacenes";
  objSend.data=
  {
    funcion:"obtenerInventario",
    datos:
    {
      almacen:almacen
    },
  };
  objSend.type="html";
  $.post(objSend.url,objSend.data,"",objSend.type)
  .done(function(data){
      $(".divReporteInv").html(data);
  })
  .fail(function(e){
    alert("Error conexión");
  });

}


// objtiene formulario para hacer ingreso de productos a almacen

var formularioIngreso =  function(datos){

  if(datos.almacen ==  undefined){
    return;
  }

  objSend.url = location.origin+"/office/almacenes";
  objSend.data=
  {
    funcion:"seleccionIngreso",
    datos:datos,
  };
  objSend.type="html";

  $.post(objSend.url,objSend.data,"",objSend.type)
  .done(function(data){
      modalCloudShow(true,"",data,"",false);
  })
  .fail(function(e){
    alert("Error conexión");
  });


}


// envia los datos para obtener articulos mediante un filtro y porder seleccionarlos


var articulosFiltro = function(datos){

  if(datos ==  undefined){
    return;
  }

  objSend.url = location.origin+"/office/almacenes";
  objSend.data=
  {
    funcion:"articulosFiltradosIngreso",
    datos:datos,
    seleccionados:articulosSeleccionados,
  };
  objSend.type="html";

  $.post(objSend.url,objSend.data,"",objSend.type)
  .done(function(data){
      $(document).find(".divResultadoBusquedas").html(data);

      $(document).find(".selecciona input[type=checkbox]").each(function(index, value){
        if(articulosSeleccionados[$(value).val()] != undefined && articulosSeleccionados[$(value).val()] != 0){
          $(this).attr("checked",true);
        }
      });

  })
  .fail(function(e){
    alert("Error conexión");
  });

}




//


var enviaArticulosSeleccionados = function (datos){

  objSend.url = location.origin+"/office/almacenes";
  objSend.data=
  {
    funcion:"formularioIngreso",
    datos:articulosSeleccionados,
    almacen:datos.almacen,
  };
  objSend.type="html";

  $.post(objSend.url,objSend.data,"",objSend.type)
  .done(function(data){
      modalCloudShow(true,"",data,"",false);
      articulosSeleccionados= {};
  })
  .fail(function(e){
    alert("Error conexión");
  });

}





var ingresoAlmacen= function($datos){

  objSend.url = location.origin+"/office/almacenes";
  objSend.data=
  {
    funcion:"ingresoAlmacen",
    datos:$datos,
  };
  objSend.type="json";


  $.post(objSend.url,objSend.data,"",objSend.type)
  .done(function(data){
      if (data.error) {
        console.log(data);
      }else{
        alert("Todo salio bien");
        location.reload();
      }
  })
  .fail(function(e){
    alert("Error conexión");
  });

}






// start jquery


$(function (){



  $(this).on("click","#tableAlmacenes tbody tr",function(){

    $almacen = $(this).attr("almacen");
    $(this).parent().children("tr").css({"background-color":"#fff"});
      obtenerInventario($almacen);
    $(this).css({"background-color":"#e8e8e8"});
  });


  $(this).on("keyup","#tableAlmacenes tbody tr td input[name=Nombre]",function(e){
    $val = $(this).val();
    $(document).find(".formAgregaAlmacen input[name=Nombre]").val($val);
  });


  $(this).on("click",".ingresoAlmacen",function(e){
    $datos =
    {
      almacen:$(this).attr("almacen"),
    }
    formularioIngreso($datos);
  });


  $(this).on("keyup",".filtrosArticulos input",function(){
      datos = {};
      $pasa = false;
    $(document).find(".filtrosArticulos input").each(function(index,field){
      if ($(field).val() != "") {
        if ($(field).val().length > 3) {
          $pasa = true;
          datos[$(field).attr("name")] = $(this).val();
        }
      }
    });

    if ($pasa || articulosSeleccionados  != {}){
      articulosFiltro(datos);
    }else{
      $(document).find(".divResultadoBusquedas").html("");
    }

  });


  $(this).on("change",".selecciona input[type=checkbox]",function (){
    if ($(this)[0].checked == true) {
          articulosSeleccionados[$(this).val()]={
            Cantidad:0,
          };
    }else {
      var indice =$(this).val();
      $.each(articulosSeleccionados,function(index,value){
        if(index == indice)
        {
          articulosSeleccionados[indice]=0;
        }
      });
    }

    $contenido = $($(this).parent().parent().html());

  });


  $(this).on("click",".divEnviaArticulos button[name=EnviarArticulos]",function(){
    $datos={
      almacen:$(this).parent().find("input[name=almacen]").val(),
    };
    enviaArticulosSeleccionados($datos);
  });


  $(this).on("click","button[name=EnviaIA]",function(){

    var datos = {
      AlmacenID:$(this).parent().find("input[name=almacen]").val(),
      articulos:{},
    };

    $(document).find(".datosAI").each(function(){
      // console.log($(this));
      datos.articulos[$(this).find("input[name=Articulo]").val()]={
        Cantidad:$(this).find("input[name=Cantidad]").val(),
        LoteID:$(this).find("input[name=Lote]").val(),
        PedimentoID:$(this).find("input[name=Pedimento]").val(),
      };

      // console.log(datos);

    });

    ingresoAlmacen(datos);

  });

})
