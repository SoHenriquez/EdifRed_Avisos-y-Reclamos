function elim(id){
    id.preventDefault();
    Swal.fire({
    title: 'Quieres eliminar el registro?',
    text: "Se eliminará de manera permanente!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si, deseo eliminarlo!'
  }).then((result) => {
    if (result.value) {
      window.location.href = "../controlador/hu4_conserjeria_controlador/hu4_delete.php?id="+id
      Swal.fire(
        'Eliminado!',
        'El registro ha sido eliminado de manera permanente.',
        'success'
      )
      
    }
  })
}
