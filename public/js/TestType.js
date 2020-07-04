$(".tableTestType").dataTable();

$(".tableTestType tbody").on("click","button#delete",function()
{
	var TestTypeId = $(this).attr("TestTypeId");
	swal.fire({
	title: '¿Esta seguro de borrar el tipo de prueba?',
	text: "¡si no lo esta puede cancelar!",
	type: 'warning',
	showCancelButton: true,
	confirmButtonColor: '#3085d6',
	cancelButtonColor: '#d33',
	cancelButtonText: 'Cancelar',
	confirmButtonText: 'Si, Eliminar prueba'

	}).then((result)=>
	{
		if (result.value)
		{
			window.location = "/testtype/"+TestTypeId+"/delete";
		}
	})
});