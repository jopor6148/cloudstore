

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
  objSend.type="html",
  $.post(objSend.url,objSend.data,"",objSend.type)
  .done(function(data){
      $(".divReporteInv").html(data);
  })
  .fail(function(){
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

})
