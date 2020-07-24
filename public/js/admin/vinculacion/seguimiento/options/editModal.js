"use strict";
/**
 * Created by wsanchez on 12/10/2015.
 */
(function (){
    var $btnModificar = $('#btn-editar-opcion');
    $btnModificar.on('click', onModificaOpcion);
    function onModificaOpcion(){
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
