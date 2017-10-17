var objSend={
  type:"json",
  data:{},
  url:"",
  async:false,
};

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

  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        async:objSend.async,
    }
  });

  $("#tableAlmacenes").on("click","tbody tr",function(){

    $almacen = $(this).attr("almacen");

    obtenerInventario($almacen);

  });

})
