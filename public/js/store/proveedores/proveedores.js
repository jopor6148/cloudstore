

var obtenerProveedor = function (datos){

  if (datos.ProveedorID == undefined) {
    return;
  }

  objSend.url = location.origin+"/store/proveedores";
  objSend.data=
  {
    ProveedorID:datos.ProveedorID
  };
  objSend.type="html",
  $.post(objSend.url,objSend.data,"",objSend.type)
  .done(function(data){
      $(document).find(".divInfoProveedor").html(data);
      modalCloudShow(false);
  })
  .fail(function(){
    alert("Error conexión");
    modalCloudShow(false);
  });


}


$(function(){

  $(this).on("click", ".tablaProveedores tbody tr",function(){
    $id = $(this).attr("proveedor");
    $datos = {
      ProveedorID:$id,
    };

    obtenerProveedor($datos);

  });

});
