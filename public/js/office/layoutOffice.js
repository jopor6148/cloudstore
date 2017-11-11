var objSend={
  type:"json",
  data:{},
  url:"",
  async:false,
};

var onlyShowModal = true;


/**
++ funcion que despliega las estructura de un modal sobre la pantalla
++  params =>
++  show : boolean para ocultar o mostrar el modal
    head: html
    head: html
    footer: html
    onlyShowModal:boolean para permitir su cierre con click fuera del modal en caso de que sea true
                  false no permite su cieera a menos que se detecte el evento cerrar
*/

var modalCloudShow = function(show,head="",content="",footer="",onlyShowModal=true){
  this.onlyShowModal = onlyShowModal;
  $(document).find(".modalCloud").find(".headModal").html(head);
  $(document).find(".modalCloud").find(".contentModal").html(content);
  $(document).find(".modalCloud").find(".footModal").html(footer);

  if (show) {
    $(document).find(".modalCloud").css({"display":"block"});
  }else{
    $(document).find(".modalCloud").css({"display":"none"});
  }
}

$(function(){

  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        async:objSend.async,
    }
  });

  $(this).on("click",".cover",function(){
    if (onlyShowModal) {
      $(document).find(".modalCloud").css({"display":"none"});
    }
  });


  $(this).on("click",".headCloase",function(){
    this.onlyShowModal = true;
    $(document).find(".modalCloud").find(".headModal").html("");
    $(document).find(".modalCloud").find(".contentModal").html("");
    $(document).find(".modalCloud").find(".footModal").html("");
    $(document).find(".modalCloud").css({"display":"none"});
  });

})
