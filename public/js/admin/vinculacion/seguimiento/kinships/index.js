lenguaje = {
    "sProcessing": "Procesando...",
    "sLengthMenu": "Mostrar _MENU_ registros",
    "sZeroRecords": "No se encontraron resultados",
    "sEmptyTable": "Ningún dato disponible en esta tabla",
    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix": "",
    "sSearch": "Buscar:",
    "sUrl": "",
    "sInfoThousands": ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst": "Primero",
        "sLast": "Último",
        "sNext": "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }
};
$(document).ready(function() {
    $('#tabla-parentescos').DataTable(
        {
            "language": lenguaje,
            "aProcessing": true,//Activamos el procesamiento del datatables
            "aServerSide": true,//Paginación y filtrado realizados por el servidor
            dom: 'Bfrtip',//Definimos los elementos del control de tabla
            "bDestroy": true,
            "iDisplayLength": 10,//Paginación
        }
    );

    $('.dltBtn').click(function(e){

        e.preventDefault();

        var id = $(this).attr('data-id');
        var parent = $(this).parent("td").parent("tr");

        //console(id);

        bootbox.dialog({
            message: "¿Estás seguro de eliminar el registro?"+id,
            title: "<i class='fa fa-trash-o'></i> ¡Atención!",
            buttons: {
                cancel: {
                    label: "No",
                    className: "btn-success",
                    callback: function() {
                        $('.bootbox').modal('hide');
                    }
                },
                confirm: {
                    label: "Eliminar",
                    className: "btn-danger",
                    callback: function() {
                        $.ajax({
                            url: 'kinships/'+id,
                            data: {
                                "_token": $("meta[name='csrf-token']").attr("content")
                            },
                            type: 'DELETE',
                        })
                            //Si todo ha ido bien...
                            .done(function(response){
                                console.log(response);
                                bootbox.alert(response);
                                parent.fadeOut('slow'); //Borra la fila afectada
                            })
                            .fail(function(){
                                bootbox.alert('Algo ha ido mal. No se ha podido completar la acción.');
                            })
                    }
                }
            }
        });
    });
});
