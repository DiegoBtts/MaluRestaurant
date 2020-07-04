$(".tableSamplesType").dataTable();

$(".tableSamplesType tbody").on("click","button#delete",function()
{
	var SamplesTypeId = $(this).attr("SamplestypeId");
	swal.fire({
	title: '¿Esta seguro de borrar el tipo de muestra?',
	text: "¡si no lo esta puede cancelar!",
	type: 'warning',
	showCancelButton: true,
	confirmButtonColor: '#3085d6',
	cancelButtonColor: '#d33',
	cancelButtonText: 'Cancelar',
	confirmButtonText: 'Si, Eliminar muestra'

	}).then((result)=>
	{
		if (result.value)
		{
			window.location = "/samplestype/"+SamplesTypeId+"/delete";
		}
	})
});