$(function(){
    $(document).on('click','#delete',function(e){
        e.preventDefault();
        var link = $(this).attr("href");
                  Swal.fire({
                    title: 'Está Segur@ que desea eliminar este registro?',
                    text: "Lo elimino, ¿en serio?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, Eliminarlo!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Eliminando... !',
                        'Registro está siendo eliminado.',
                        'success'
                      )
                    }
                  }) 


    });

  });