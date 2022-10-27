function useSwallSuccess(message, position = 'bottom-end')
{
    Swal.fire({
        toast: true,
        icon: "success",
        title: message,
        position: position,
        showConfirmButton: false,
        timer: 4000,
      });
}

 function useSwallError(message, position = 'top-end')
{
    Swal.fire({
        toast: true,
        icon: "error",
        title: message,
        position: position,
        showConfirmButton: false,
        timer: 4000,
      });
}