$(".tableClient").dataTable();

$(".tableClient tbody").on("click","button#delete",function()
{
	var ClientId = $(this).attr("ClientId");
	swal.fire({
	title: '¿Esta seguro de borrar el cliente?',
	text: "¡si no lo esta puede cancelar!",
	type: 'warning',
	showCancelButton: true,
	confirmButtonColor: '#3085d6',
	cancelButtonColor: '#d33',
	cancelButtonText: 'Cancelar',
	confirmButtonText: 'Si, borrar cliente'

	}).then((result)=>
	{
		if (result.value)
		{
			window.location = "/client/"+ClientId+"/delete";
		}
	})
});