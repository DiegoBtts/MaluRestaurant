$(".tableCategory").dataTable();
$(".tableCategory tbody").on("click","button#delete",function()
{
	var CategoryId = $(this).attr("CategoryId");
	swal.fire({
	title: '¿Esta seguro de borrar el producto?',
	text: "¡si no lo esta puede cancelar!",
	type: 'warning',
	showCancelButton: true,
	confirmButtonColor: '#3085d6',
	cancelButtonColor: '#d33',
	cancelButtonText: 'Cancelar',
	confirmButtonText: 'Si, Eliminar producto'

	}).then((result)=>
	{
		if (result.value)
		{
			window.location = "/category/"+CategoryId+"/delete";
		}
	})
});