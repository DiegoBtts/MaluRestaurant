$('#action').click(function(){
    if(res !=0){
        console.log(comanda);
        console.log(res[0].orderfood_id);
     $('#action').attr('data-toggle','modal'); 
     $('#total-two').text(total);   
    }else{
        swal.fire("¡Cuidado!", "No se ha iniciado una venta.", "warning");
    }
    
});