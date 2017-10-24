
var obtenerAlmacen = function(sucursal){

  if (sucursal == undefined) {
    return;
  }

  modalCloudShow(true);

  objSend.url = location.origin+"/office/branches";
  objSend.data=
  {
    funcion:"obtenerAlmacen",
    datos:
    {
      sucursal:sucursal
    },
  };
  objSend.type="html",
  $.post(objSend.url,objSend.data,"",objSend.type)
  .done(function(data){
      $(".divContrlesSucursal").html(data);
      modalCloudShow(false);
  })
  .fail(function(){
    alert("Error conexión");
    modalCloudShow(false);
  });

}

$(function(){

$(this).on("click",".tableSucursales tbody tr",function(){
  console.log($(this));
  $sucursal =$(this).attr("sucursal");

  obtenerAlmacen($sucursal);

});

});
