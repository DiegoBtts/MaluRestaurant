var token = $("#token").val();
var route = "/receiptsamples/show";

$(".tableReceiptSamples").dataTable({
    "destroy": true,
    "ajax":
    {
        url: route,
        headers:{'X-CSRF-TOKEN':token},
        type: "PUT",
    },
    "language": {

        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }

    }

});

$(".tableReceiptSamples").on("click", "button.delete", function () {
    var ReceiptSamplesId = $(this).attr("ReceiptSamplesId");
    swal.fire({
        title: "¿Esta seguro de borrar la muestra?",
        text: "¡si no lo esta puede cancelar!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "Cancelar",
        confirmButtonText: "Si, borrar",
    }).then((result) => {
        if (result.value) {
            window.location = "/receiptsamples/" + ReceiptSamplesId + "/delete";
        }
    });
});

$(".tableReceiptSamples").on("click","button.printCode",function()
{
    var code = $(this).attr("code");
    printCode(code);
})

$(document).ready(function()
{
   changeSample($("#appointment_id").val());
})

$("#appointment_id").change(function()
{
    changeSample($(this).val());
})

function changeSample(id)
{
    var route = "/receiptsamples/see/"+id;
    var token = $("#token").val(); 

    $.ajax({
        url: route,
        headers:{'X-CSRF-TOKEN':token},
        method: 'PUT',
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta)
        {
           $("#sample").val(respuesta["name"]);
        }
    })
}