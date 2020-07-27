"use strict";

(function (){
    var $btnModificar = $('#btn-editar-opcion');
    $btnModificar.on('click', onModificaOpcion);

    function onModificaOpcion(){
        alert("En el boton");
        var $form = $('#form-editModal');
        var url = $form.attr('action');
        var data = $form.serialize();

        $.post(url, data, function(result){
            if (result.ok){
                $('#modal').modal('hide');
                location.reload();
            }
            else {
                console.log(result.msg);
            }
        });
    }

})();
