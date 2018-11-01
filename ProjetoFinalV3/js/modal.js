function criarModal(obj){

   const modal_estilos = 'display: block;'
   +'width: 70%; max-width: 500px;'
   +'background: #fff; padding: 15px;'
   +'border-radius: 5px;'
   +'-webkit-box-shadow: 0px 6px 14px -2px rgba(0,0,0,0.75);'
   +'-moz-box-shadow: 0px 6px 14px -2px rgba(0,0,0,0.75);'
   +'box-shadow: 0px 6px 14px -2px rgba(0,0,0,0.75);'
   +'position: fixed;'
   +'top: 50%; left: 50%;'
   +'transform: translate(-50%,-50%);'
   +'z-index: 99999999; text-align: center';

   const fundo_modal_estilos = 'top: 0; right: 0;'
   +'bottom: 0; left: 0; position: fixed;'
   +'background-color: rgba(0, 0, 0, 0.6); z-index: 99999999;'
   +'display: none;';

   const meu_modal = '<div id="fundo_modal" style="'+fundo_modal_estilos+'">'
   +'<div id="meu_modal" style="'+modal_estilos+'">'
      +'<h5 class="border-bottom p-2 text-left">Descrição</h5><br />'
            +'<div class="row">'
               +'<div class="col-sm-12">'
                  +'<div class="form-group">'
                     +'<p class="text-justify">'+obj.nextElementSibling.value+'<p>'
                  +'</div>'
               +'</div>'
            +'</div>'
      +'<button type="button" class="close" style="top: 5px; right: 10px; position: absolute; cursor: pointer;"><span>&times;</span></button>'
   +'</div></div>';

   $("body").append(meu_modal);
   $("#fundo_modal").fadeIn();
   $("#fundo_modal, .close").click(function(){ $("#fundo_modal").remove(); });
   $("#meu_modal").click(function(e){ e.stopPropagation(); });

}

