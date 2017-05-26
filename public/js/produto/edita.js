 $(document).ready(function() {
    // Stuff to do as soon as the DOM is ready;
    toastr.options.progressBar = true;
     toastr.options.closeButton = true;
     $("#estoque_observacao").hide();
     $(".estoque_atual").change(function(){
        $("#estoque_observacao").show();
     }).blur(function(){
      if($(".estoque_antigo").val() != $(".estoque_atual").val() && $("#detalhe").val() === ""){
          toastr.error('Favor informar motivo da mudança de estoque');
            $(".btn-primary").attr('disabled','disabled');
        }else{
             $("input").removeAttr('disabled');
        } 
    });
    $("#detalhe").blur(function(){
      if($(".estoque_antigo").val() != $(".estoque_atual").val() && $("#detalhe").val() === ""){
          toastr.error('Favor informar motivo da mudança de estoque');
            $(".btn-primary").attr('disabled','disabled');
        }else{
             $("input").removeAttr('disabled');
        } 
    });
});
