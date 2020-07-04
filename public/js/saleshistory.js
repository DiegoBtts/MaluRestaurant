$(".tableSales").dataTable({
	"lengthMenu":[[5,10, 20, 25, 50, -1], [5,10, 20, 25, 50, "Todos"]],
});
$(".tableSales tbody").on("click","button#delete",function()
{
	var SalesHistoryId = $(this).attr("SalesHistoryId");
	swal.fire({
	title: '¿Esta seguro de borrar la venta ?',
	text: "¡si no lo esta puede cancelar!",
	type: 'warning',
	showCancelButton: true,
	confirmButtonColor: '#3085d6',
	cancelButtonColor: '#d33',
	cancelButtonText: 'Cancelar',
	confirmButtonText: 'Si, Eliminar venta'

	}).then((result)=>
	{
		if (result.value)
		{
			window.location = "/saleshistory/"+SalesHistoryId+"/delete";
		}
	})
});

$(".tableSales tbody").on("click","button.print",function()
{
	var id = $(this).attr("saleId");
	printTicket(id);
});

function printTicket(id)
{
    var mywindow = window.open('ticket/ticket.php?id='+id, 'PRINT');
    mywindow.focus(); // necessary for IE >= 10*/    
    setTimeout(function() {
        mywindow.print();
        mywindow.close();
    },300);
}

$(".tableSales tbody").on("click","button.details",function()
{
	$("#content_table_details").empty();
	var saleId = $(this).attr("saleId");
	var route = "/saleshistory/see/"+saleId;
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
        	for (var i = 0; i < respuesta.length; i++) 
        	{
	           $("#content_table_details").append("<tr>"+
	           	"<td>"+respuesta[i][0]["codigo"]+"</td>"+
	                "<td>"+respuesta[i][0]["client"]+"</td>"+
	                "<td>"+respuesta[i][0]["price"]+"</td>"+
	            "</tr>");
        	}
        }
    })
});
