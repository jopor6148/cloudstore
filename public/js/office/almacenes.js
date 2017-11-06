

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
    console.log(e);
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
    funcion:"formularioIngreso",
    datos:datos,
  };
  objSend.type="html";

  $.post(objSend.url,objSend.data,"",objSend.type)
  .done(function(data){
      modalCloudShow(true,"",data,"",false);
  })
  .fail(function(e){
    console.log(e);
    alert("Error conexión");
  });


}


var articulosFiltro = function(datos){

  if(datos ==  undefined){
    return;
  }

  objSend.url = location.origin+"/office/almacenes";
  objSend.data=
  {
    funcion:"articulosFiltradosIngreso",
    datos:datos,
  };
  objSend.type="html";

  $.post(objSend.url,objSend.data,"",objSend.type)
  .done(function(data){
      $(document).find(".divResultadoBusquedas").html(data);
  })
  .fail(function(e){
    console.log(e);
    alert("Error conexión");
  });

}


$(function (){



  $(this).on("click","#tableAlmacenes tbody tr",function(){

    $almacen = $(this).attr("almacen");
    $(this).parent().children("tr").css({"background-color":"#fff"});
      obtenerInventario($almacen);
    $(this).css({"background-color":"#e8e8e8"});
  });


  $(this).on("keyup","#tableAlmacenes tbody tr td input[name=Nombre]",function(e){
    $val = $(this).val();
    console.log($val);
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
      console.log("pasa1");
    $(document).find(".filtrosArticulos input").each(function(index,field){
      if ($(field).val() != "") {
        if ($(field).val().length > 3) {
          console.log("pasa");
          $pasa = true;
          datos[$(field).attr("name")] = $(this).val();
        }
      }
    });

    if ($pasa){
      articulosFiltro(datos);
    }else{
      $(document).find(".divResultadoBusquedas").html("");
    }

  });

})
