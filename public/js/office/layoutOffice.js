var objSend={
  type:"json",
  data:{},
  url:"",
  async:false,
};


var modalCloudShow = function(show,head="",content="",footer=""){
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

})
